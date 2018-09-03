<?php
if (isset($_SESSION['email'])){
    if (isset($_POST['export2csv'])) {

        // séléction des infos sql
        $sql = "SELECT * FROM adress WHERE id_user='$userID'"; 
        $datas = mysqli_fetch_all($db->query($sql), MYSQLI_ASSOC);

        // création du fichier
        $file = './csv/'. $userlogged['username']."-".$userlogged['id']."-".date('h-i-s').".csv"; 
        $fp = fopen($file, 'w');

        // en-tête
        fputcsv($fp, $fieldlist);

        // tableau
        foreach ($datas as $fields) {
             fputcsv($fp, $fields);
         }
         
         fclose($fp);

         // génération du fichier et download
         if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        } ?>
       
        <div class="alert alert-success" role="alert">
        <?php echo MSG_ADMIN_THEFILE." ".$file." ".MSG_ADMIN_DOWNLOAD_OK?>
        </div>
<?php
    }
}
?>