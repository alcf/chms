<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(array(RoleType::ChMSAdministrator));

	class AdminMainForm extends ChmsForm {
		protected $strPageTitle = 'Administration - Error Log';
		protected $intNavSectionId = ChmsForm::NavSectionAdministration;

		protected $dtgErrors;
		protected $blnArchive = false;
		protected $pxyMove;
		protected $pxyDelete;

		protected function Form_Create() {
			$this->pxyMove = new QControlProxy($this);
			$this->pxyMove->AddAction(new QClickEvent(), new QAjaxAction('pxyMove_Click'));
			$this->pxyMove->AddAction(new QClickEvent(), new QTerminateAction());

			$this->pxyDelete = new QControlProxy($this);
			$this->pxyDelete->AddAction(new QClickEvent(), new QAjaxAction('pxyDelete_Click'));
			$this->pxyDelete->AddAction(new QClickEvent(), new QTerminateAction());

			$this->dtgErrors = new QDataGrid($this);
			$this->dtgErrors->SetDataBinder('dtgErrors_Bind');

			$this->dtgErrors->AddColumn(new QDataGridColumn('Options', '<?= $_FORM->colOptions_Render($_ITEM); ?>', 'HtmlEntities=false', 'Width=60px'));
			$this->dtgErrors->AddColumn(new QDataGridColumn('Date', '<?= $_FORM->colDate_Render($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgErrors->AddColumn(new QDataGridColumn('Type', '<?= $_FORM->colType_Render($_ITEM); ?>'));
			$this->dtgErrors->AddColumn(new QDataGridColumn('Title', '<?= $_ITEM->title; ?>'));
			$this->dtgErrors->AddColumn(new QDataGridColumn('Server and Script', '<strong><?= htmlentities($_ITEM->script); ?></strong><br/>' .
				'<span class="meta"><?= htmlentities($_ITEM->server); ?></span>', 'HtmlEntities=false'));
			$this->dtgErrors->AddColumn(new QDataGridColumn('Agent', '<span class="meta"><?= htmlentities($_ITEM->agent); ?></span>', 'HtmlEntities=false'));
		}

		public function colDate_Render(SimpleXmlElement $objErrorXml) {
			$dttDate = new QDateTime($objErrorXml->isoDateTime);
			return $dttDate->__toString('MMM D') . '<br/><span class="meta">' . $dttDate->__toString('h:mm:ss&nbsp;z') . '</span>';
		}

		public function colType_Render(SimpleXmlElement $objErrorXml) {
			if ((string) $objErrorXml->type)
				return $objErrorXml->type;
			else
				return 'Other';
		}

//		public function pxyMove_Click($strFormId, $strControlId, $strParameter) {
//			if (strpos($strParameter, '..') !== false)
//				throw new QCallerException('Invalid Error File / Parameter');
//			if ($this->blnArchive) {
//				rename(ERROR_LOG_ARCHIVE_PATH . '/' . $strParameter, ERROR_LOG_PATH . '/' . $strParameter);
//			} else {
//				rename(ERROR_LOG_PATH . '/' . $strParameter, ERROR_LOG_ARCHIVE_PATH . '/' . $strParameter);
//			}
//
//			$this->dtgErrors->Refresh();
//		}

		public function pxyDelete_Click($strFormId, $strControlId, $strParameter) {
			if (strpos($strParameter, '..') !== false)
				throw new QCallerException('Invalid Error File / Parameter');

			if ($this->blnArchive) {
				unlink(__ERROR_LOG_ARCHIVE__ . '/' . $strParameter);
			} else {
				unlink(__ERROR_LOG__ . '/' . $strParameter);
			}

			$this->dtgErrors->Refresh();
		}

		public function colOptions_Render(SimpleXmlElement $objErrorXml) {
			$strToReturn = '<a title="View" href="/admin/error_log/view.php/' . $objErrorXml->filename . '">View</a>';
			
			$strToReturn .= ' <a title="Delete" href="#" ' . $this->pxyDelete->RenderAsEvents((string) $objErrorXml->filename, false) . '>Delete</a>';
			return $strToReturn;
		}

		protected function dtgErrors_Bind() {
			$objViewer = new QErrorLogViewer(__ERROR_LOG__);
			$this->dtgErrors->DataSource = $objViewer->GetAsDataSource();
		}
	}

	AdminMainForm::Run('AdminMainForm');
?>