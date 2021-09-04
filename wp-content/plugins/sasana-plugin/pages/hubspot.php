<?php

    $curl = curl_init();    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.hubapi.com/marketing-emails/v1/emails?hapikey=23b11be5-9476-49d6-8c26-cb20276d204a&limit=300&orderBy=-created',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    
    $response = json_decode(curl_exec($curl),TRUE);
    curl_close($curl);

    $result = $wpdb->get_results("SELECT * FROM wp_newsletter");
    $column = array_column($result,'email_name');


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.css">
    <style>
      .dataTables_length > label > select{
        width: 52px;
      }
    </style>

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="container mt-3">
  <h3 class="mb-3">Email from hubspot</h3>
    <table class="table" id="hubspot-table">
        <thead>
            <tr>
            <th scope="col"><input type="checkbox" id="checkAll"></th>
            <th scope="col">Email</th>
            <th scope="col">Author</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i=0; $i < count($response['objects']) ; $i++){ ?>
            <tr>
                <th scope="row"><input type="checkbox" class="checkBox" emailId="<?= $response['objects'][$i]['id'] ?>" emailName="<?= $response['objects'][$i]['name'] ?>" emailAuthor="<?= $response['objects'][$i]['authorName'] ?>" emailUrl="<?= $response['objects'][$i]['url'].'?hs_preview='.$response['objects'][$i]['previewKey'].'-'.$response['objects'][$i]['analyticsPageId'] ?>" ></th>
                <td><?php echo $response['objects'][$i]['name']; ?></td>
                <td><?php echo $response['objects'][$i]['authorName']; ?></td>
                <td><a href="<?= $response['objects'][$i]['url'].'?hs_preview='.$response['objects'][$i]['previewKey'].'-'.$response['objects'][$i]['analyticsPageId'] ?>" class="btn btn-success" target="_BLANK">View</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary float-end mt-3" id="add-to-news-letter">Add to newsletter page</button>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.js"></script>
    <script>

        $('#add-to-news-letter').on('click',function(){
            
          // Menampung data dalam bentuk array
            let dataArray = [];  

            $('input:checkbox.checkBox').each(function () {
              if(this.checked){

                var data = $(this)[0];
                var emailId = data.attributes.emailId.nodeValue;
                var emailName = data.attributes.emailName.nodeValue;
                var emailAuthor = data.attributes.emailAuthor.nodeValue;
                var emailUrl = data.attributes.emailUrl.nodeValue;
              
                dataArray.push([emailId,emailName,emailAuthor,emailUrl]);
              }
            });


            $.ajax({
              url: '/wordpress/dramedia/wp-admin/admin-ajax.php',
              data:{
                'action': 'hubspot_to_db',
                'data': dataArray
              },
              success: function(data){
                console.log('Horeeee!');
              }
            });

        });


        $("#checkAll").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        $('#hubspot-table').DataTable();

    </script>
  
  </body>
</html>