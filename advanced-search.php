<?php
include 'modals/jobDAO.php';
$jobDAO = new jobDAO();


$jobspecializations = $jobDAO->get_all_job_Types();


$jobDAO->disconnect();

include 'views/advanced-search.V.php';
?>