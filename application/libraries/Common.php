<?php
class Common {
    public function errorPage()
    {
        $this->output->set_status_header('404');
        
        $this->load->view("header");
        $this->load->view("error");
        $this->load->view("footer");
    }

	// File Upload Common Function
	public function fileUpload($filesArray, $uploadDir, $allowTypes) {
		$uploadedFiles = array();
	
		$fileName = basename($filesArray['name']);
		$fileName = $this->imageRename($fileName);
		$targetFilePath = $uploadDir . $fileName;

		$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
	
		if (in_array($fileType, $allowTypes)) {
			if (move_uploaded_file($filesArray['tmp_name'], $targetFilePath)) {
				$uploadedFiles[] = $uploadDir . $fileName;
			} else {
				$data['message'] = 'Sorry, there was an error uploading your file.';
			}
		} else {
			$data['message'] = 'Sorry, only PDF, Doc, and docs files are allowed to upload.';
		}
		return $uploadedFiles;
	}
    
	// Multi File Upload Common Function
	public function multiFileUpload($filesArray, $uploadDir, $allowTypes) {
		$uploadedFiles = array();
		if (!isset($filesArray['name'])) {
			return $uploadedFiles;
		}

		if (is_array($filesArray['name'])) {
			$count = count($filesArray['name']);
			for ($i = 0; $i < $count; $i++) {
				if (isset($filesArray['error'][$i]) && $filesArray['error'][$i] === UPLOAD_ERR_OK && !empty($filesArray['name'][$i])) {
					$originalName = basename($filesArray['name'][$i]);
					$fileName = $this->imageRename($originalName);
					$targetFilePath = $uploadDir . $fileName;
					$fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

					if (in_array($fileType, $allowTypes)) {
						if (!is_dir($uploadDir)) {
							mkdir($uploadDir, 0777, true);
						}
						if (move_uploaded_file($filesArray['tmp_name'][$i], $targetFilePath)) {
							$uploadedFiles[] = $uploadDir . $fileName;
						}
					}
				}
			}
		} else {
			return $this->fileUpload($filesArray, $uploadDir, $allowTypes);
		}
		return $uploadedFiles;
	}
    
    public function imageRename($fileName)
    {
    	$currentDate = date('ymdHis') . mt_rand(100, 999);
    	$extension   = pathinfo($fileName, PATHINFO_EXTENSION);
		$fileName    = pathinfo($fileName, PATHINFO_FILENAME);
		$newFilename = str_replace(' ', '', strtolower($fileName));
		$newFilename = $newFilename . $currentDate;
		$newFilename = $newFilename . "." . $extension;
		return $newFilename;
    }
}
?>