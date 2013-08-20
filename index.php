<?php
include 'modals/jobDAO.php';
include 'controller.inc.php';
$jobDAO = new jobDAO();


$jobspecializations = $jobDAO->get_all_job_Types();


$jobDAO->disconnect();

include 'views/index.V.php';
?>