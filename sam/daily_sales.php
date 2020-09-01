<?php
  $page_title = 'Reporte Dias';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php include_once('layouts/header.php'); ?>


<html lang="en">
<head>
    <script type="text/javascript">
        // post the auth token to the iFrame.
        function postActionLoadReport() {

            // get the access token.
            accessToken = '<?php echo $accessToken;?>';

            // return if no a
            if ("" === accessToken)
                return;

            // construct the push message structure
            // this structure also supports setting the reportId, groupId, height, and width.
            // when using a report in a group, you must provide the groupId on the iFrame SRC
            var m = { action: "loadReport", accessToken: accessToken};
            message = JSON.stringify(m);

            // push the message.
            iframe = document.getElementById('iFrameEmbedReport');
            iframe.contentWindow.postMessage(message, "*");;
        }
     </script>
</head>
<body>
    <div>
        <p><b>Reporte Embebido</b></p>
        <table> <tr>
                    <td>
                        <iframe id="iFrameEmbedReport" src="<?php echo $reportURI;?>" onload="postActionLoadReport()" height="768px" width="1024px" frameborder="1" seamless></iframe>
                    </td>
                </tr>
        </table>
    </div>
</body>

<?php include_once('layouts/footer.php'); ?>