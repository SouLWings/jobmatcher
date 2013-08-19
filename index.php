<?php
include 'modals/jobDAO.php';

$jobDAO = new jobDAO();
$jobtypes = $jobDAO->get_all_job_Types();
$jobDAO->disconnect();

include 'views/index.V.php';
?>