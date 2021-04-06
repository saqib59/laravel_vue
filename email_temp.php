<?php
/*Template Name: Email Template*/
get_header();

$user_id = get_current_user_id();

if (isset($_GET['uid'])) {
	$user_id = $_GET['uid'];
}

$args = [ 	
				'post_type' => 'stepform',
				'posts_per_page' => 1, 
				'post_status'   => 'publish',
				 'author' => $user_id,
				]; 
				$inser_post = get_posts( $args ); 
				$post_id = ($inser_post[0]->ID);
// wp_get_attachment_image_src( int $attachment_id, string|int[] $size = 'thumbnail', bool $icon = false )
$post_thumbnail_id = get_post_thumbnail_id($post_id);
$post_thumbnail = wp_get_attachment_image_src( $post_thumbnail_id)[0];

?>
<!DOCTYPE html>
<html>
<head>
	<title>IMed Spa</title>
</head>
<style type="text/css">
body, #body_style {
    background: #fff;
    color: #000;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
}
tr {
    text-align: left !important;
}	
</style>
<body>
<table width="800" border="0" style="margin: 0 auto;">
  <tbody>
    <tr>
      <td height="45">&nbsp;</td>
    </tr>
    <tr>
      	<td>
	        <table width="798" border="0">
	          <tr>
	            <td>
	              	<table width="100%" border="0">
		                <tr>
		                  <td>
		                    <table width="100%" border="0">
		                      <tbody>
		                        <tr>
		                          <td style="text-align: center;">
		                          	<span style="font-size: 40px;"><strong>TLC Advanced Nursing, LLC</strong></span>
		                          </td>
		                        </tr>
		                      </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr><!----SPACER START FROM HERE---->
		                	<table width="100%" border="0">
		                      <tbody>
		                        <tr>
		                          	<td height="45"></td>
		                        </tr>
		                      </tbody>
		                    </table>
		                </tr><!----SPACER END FROM HERE---->
		                <tr>
		                	<td>
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                        	<span><strong>First Name:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Middle Name:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Last Name:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Date of Birth:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                        	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                        		<?= (get_post_meta( $post_id,'',$single = false )['first_name'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['middle_name'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['last_name'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['date_of_birth'][0]);?></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0">
				                    <tbody>
				                        <tr>
				                          	<td>
				                          		<span><strong>SSN:</strong></span>
				                          	</td>
				                          	<td width="20">&nbsp;</td>
				                          	<td>
				                          		<span><strong>Street Address:</strong></span>
				                          	</td>
				                        </tr>
				                        <tr>
				                          	<td>
				                          		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
				                          		<?= (get_post_meta( $post_id,'',$single = false )['ssn'][0]);?></span>
				                          	</td>
				                          	<td width="20">&nbsp;</td>
				                          	<td>
				                          		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
				                          		<?= (get_post_meta( $post_id,'',$single = false )['street_address'][0]);?></span>
				                          	</td>
				                        </tr>
				                    </tbody>
			                    </table>
		                    </td>
		                </tr>
		                <tr>
		                	<td>
		                		<table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span><strong>City:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>State:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Zip Code:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['city'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['state'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['zip_code'][0]);?></span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span><strong>Phone Number:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Email Address:</strong></span>
					                        </td>
					                    </tr>
				                        <tr>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['phone_number'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['email_address'][0]);?></span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                		<table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span><strong>Are you eligible to work in the United States?</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>If you are under the age of 18, do you have an employment/age certificate?</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Have you ever been convicted of or pleaded no contest to a felony within the last five years?</strong></span>
					                        </td>
					                    </tr>
				                        <tr>
					                        <td>
					                          	<span><?php echo (get_post_meta($post_id)['eligible'][0] == 'yes' ) ?  'Yes' : ''?>
					                          	<?php echo (get_post_meta($post_id)['eligible'][0] == 'no' ) ?  'No' : ''?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><?php echo (get_post_meta($post_id)['under_18'][0] == 'yes' ) ?  'Yes' : ''?>
					                          	<?php echo (get_post_meta($post_id)['under_18'][0] == 'no' ) ?  'No' : ''?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><?php echo (get_post_meta($post_id)['five_years'][0] == 'yes' ) ?  'Yes' : ''?>
					                          	<?php echo (get_post_meta($post_id)['five_years'][0] == 'no' ) ?  'No' : ''?></span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span><strong>Please Explain:</strong></span>
					                        </td>
					                    </tr>
				                        <tr>
					                        <td>
					                          	<span style="border:1px solid #ccc; min-height: 100px; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['please_explain'][0]);?></span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Position Availability:</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
			                    <table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>Position applying for:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Desired Pay:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;"><?= (get_post_meta( $post_id,'',$single = false )['applying_postition'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;"><?= (get_post_meta( $post_id,'',$single = false )['desired_pay'][0]);?></span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>Max time/Miles of travel:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Max hours per week:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>What Date are you available to start:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['max_time_miles_travel'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['max_hour_per_work'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['date_of_your_availibility'][0]);?></span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Days Available:</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
			                    <table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span>From <?= (get_post_meta( $post_id,'',$single = false )['from_sunday'][0]);?> to 
					                          		Sunday <?= (get_post_meta( $post_id,'',$single = false )['to_sunday'][0]);?></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<span>From <?= (get_post_meta( $post_id,'',$single = false )['from_Monday'][0]);?> to Monday 
					                          	<?= (get_post_meta( $post_id,'',$single = false )['to_Monday'][0]);?></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<span>From <?= (get_post_meta( $post_id,'',$single = false )['from_Tuesday'][0]);?> to Tuesday <?= (get_post_meta( $post_id,'',$single = false )['to_Tuesday'][0]);?></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<span>From <?= (get_post_meta( $post_id,'',$single = false )['from_Wednesday'][0]);?> to Wednesday <?= (get_post_meta( $post_id,'',$single = false )['to_Wednesday'][0]);?></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<span>From <?= (get_post_meta( $post_id,'',$single = false )['from_Thursday'][0]);?> to Thursday <?= (get_post_meta( $post_id,'',$single = false )['to_Thursday'][0]);?></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<span>From <?= (get_post_meta( $post_id,'',$single = false )['from_Friday'][0]);?> to Friday <?= (get_post_meta( $post_id,'',$single = false )['to_Friday'][0]);?></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<span>From <?= (get_post_meta( $post_id,'',$single = false )['from_Saturday'][0]);?> to Saturday <?= (get_post_meta( $post_id,'',$single = false )['to_Saturday'][0]);?></span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Education:</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
			                    <table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>Name of School</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Address of School:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       		<?= (get_post_meta( $post_id,'',$single = false )['st_2_name_of_school'][0]);?></span>
					                       </td> 
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       		<?= (get_post_meta( $post_id,'',$single = false )['st_2_address_of_school'][0]);?></span>
					                       </td> 
				                        </tr>
				                        <tr>
					                        <td>
					                          	<span><strong>Degree/Diploma:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Graduation Date:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       		<?php echo (get_post_meta($post_id)['st_2_degree_diploma'][0] == 'Degree' ) ?  'Degree' : ''?>
					                       	<?php echo (get_post_meta($post_id)['st_2_degree_diploma'][0] == 'Diploma' ) ?  'Diploma' : ''?></span>
					                       </td> 
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       		<?= (get_post_meta( $post_id,'',$single = false )['st_2_graduation_date'][0]);?></span>
					                       </td> 
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Skills and Qualifications:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                         	<span>please list your certificate/ license numbers.<span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
			                    <table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>CNA</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>CMA</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>LPN</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>RN</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_cna'][0]);?></span>
					                       </td> 
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       		<?= (get_post_meta( $post_id,'',$single = false )['st_2_cma'][0]);?></span>
					                       </td>
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       		<?= (get_post_meta( $post_id,'',$single = false )['st_2_lpn'][0]);?></span>
					                       </td>
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       		<?= (get_post_meta( $post_id,'',$single = false )['st_2_rn'][0]);?></span>
					                       </td> 
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span>Please list any other certificates, training, or awards include expirations: (ex. CPR)</span>
					                        </td>
					                    </tr>
				                        <tr>
					                       <td>
					                       		<span style="border:1px solid #ccc; min-height: 100px; width: auto; padding: 15px; display: block;">
					                       		<?= (get_post_meta( $post_id,'',$single = false )['st_2_list_certificates_training_awards'][0]);?></span>
					                       </td>
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Employment History:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                         	<span>please list most recent employer first.<span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
			                    <table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 20px;"><strong>Position 1:</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
			                    <table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>Employer:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Supervisor:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Phone:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Email:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_po_1_employer'][0]);?>
					                       		</span>
					                       </td> 
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_po_1_supervisor'][0]);?>
					                       		</span>
					                       </td>
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_po_1_phone'][0]);?>
					                       		</span>
					                       </td>
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_po_1_email'][0]);?>
					                       		</span>
					                       </td> 
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>Address:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_po_1_address'][0]);?>
					                       		</span>
					                       </td>
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>Position Held:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>From:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>to:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Is this your Present employer:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_po_1_position_held'][0]);?>
					                       		</span>
					                       </td> 
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_po_1_from'][0]);?>
					                       		</span>
					                       </td>
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_po_1_to'][0]);?>
					                       		</span>
					                       </td>
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_po_1_present_employer'][0]);?>
					                       		</span>
					                       </td> 
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>Responsibilities:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Reason for leaving:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                       <td>
					                       		<span style="border:1px solid #ccc; min-height: 50px; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_po_1_responsibilities'][0]);?>
					                       		</span>
					                       </td>
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; min-height: 50px; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_po_1_reason_for_leaving'][0]);?>
					                       		</span>
					                       </td>
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 20px;"><strong>Position 2:</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
			                    <table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>Employer:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Supervisor:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Phone:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Email:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_po_2_employer'][0]);?>
					                       		</span>
					                       </td> 
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_po_2_supervisor'][0]);?>
					                       		</span>
					                       </td>
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_po_2_phone'][0]);?>
					                       		</span>
					                       </td>
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_po_2_email'][0]);?>
					                       		</span>
					                       </td> 
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>Address:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_po_2_address'][0]);?>
					                       		</span>
					                       </td>
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>Position Held:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>From:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>to:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Is this your Present employer:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_po_2_position_held'][0]);?>
					                       		</span>
					                       </td> 
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_po_2_from'][0]);?>
					                       		</span>
					                       </td>
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_po_2_to'][0]);?>
					                       		</span>
					                       </td>
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_po_2_present_employer'][0]);?>
					                       		</span>
					                       </td> 
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>Responsibilities:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Reason for leaving:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                       <td>
					                       		<span style="border:1px solid #ccc; min-height: 50px; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_po_2_responsibilities'][0]);?>
					                       		</span>
					                       </td>
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; min-height: 50px; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_po_2_reason_for_leaving'][0]);?>
					                       		</span>
					                       </td>
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                		<table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span><strong>May we Contact your Present Employer?</strong></span>
					                        </td>
					                    </tr>
				                        <tr>
					                        <td>
					                          	<span><?php echo (get_post_meta($post_id)['st_2_po_2_rd_contact_employer'][0] == 'yes' ) ?  'Yes' : ''?>
					                          		<?php echo (get_post_meta($post_id)['st_2_po_2_rd_contact_employer'][0] == 'no' ) ?  'No' : ''?>
					                          	</span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 20px;"><strong>References:</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
			                    <table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>Name/Title:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Address:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Phone Number:</strong></span>
					                         </td>
				                        </tr>
				                        <tr>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_references_name_title'][0]);?>
					                       		</span>
					                       </td> 
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_references_address'][0]);?>
					                       		</span>
					                       </td>
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_references_phone_number'][0]);?>
					                       		</span>
					                       </td> 
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span>I certify that information contained in this application is true and complete. I understand that false information may be grounds for not hiring or immediate termination of employment at any point in the future, if hired. I authorize the verification of any or all information listed above.</span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
<!-- 			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>Applicant Signature:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Date:</strong></span>
					                        </td>
					                    </tr>
				                        <tr>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<img src="<?= $post_thumbnail ?>">
					                       		</span>
					                       </td> 
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_conformation_date'][0]);?>
					                       		</span>
					                       </td>
				                        </tr>
				                    </tbody>
		                    	</table> -->
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Welcome:</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<p>Welcome to <strong>TLC Advanced Nursing, LLC.</strong> We are pleased to have you join our team; your role is crucial in meeting the goals of our company. We believe your skills, experiences, and education, will prove to be a great asset of our companies continued success.</p>
					                         	<p>Please be sure to have all the appropriate documentation completed and turned in to Jeanetta Brownlee. You will receive a welcome Pack which will include the following;</p>
					                         	<ol>
													<li>Name Tag</li>
													<li>A TLC Pen &amp; Highlighter</li>
													<li>
														A company T-Shirt
														<ul>
															<li>Any additional company attire can be purchased. Contact Jeanetta.</li>
														</ul>
													</li>
													<li>Weekly Time Sheet sample</li>
													<li>Policies for reminder</li>
												</ol>
												<p>You will be added to our company mobile app, this is where you can get in touch with anyone working with our company. The main purpose of this app is for you to receive, request, or cover shifts.</p>
												<p>If you have any questions, please feel free to contact us. We look forward to having you on our team here at TLC Advanced Nursing, LLC.</p>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span><strong>Jeanetta Brownlee:</strong></span>
					                        </td>
					                        <td>
					                         	<a href="tel:6205213607">(620) 521-3607</a>
					                        </td>
					                        <td>
					                         	<a href="mailto:TLCAdvancednsg@gmail.com">TLCAdvancednsg@gmail.com</a>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                         	<span><strong>Jessica Fisher:</strong></span>
					                        </td>
					                        <td>
					                         	<a href="tel:7852800152">(785) 280-0152</a>
					                        </td>
					                        <td>
					                         	<a href="mailto:tlcadvancedstaff@gmail.com">tlcadvancedstaff@gmail.com</a>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Check List:</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<!-- <table width="100%" border="0"> SECTION SPACER---->
				                    <!-- <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table> --><!----SECTION SPACER---->
<!-- 		                		<table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span>Application</span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table> -->
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
				                	<?php

				                	// $arrayName = array('ab' => get_post_meta($post_id)['st_3_rd_checkList_application'][0],
				                	// 			'cd' => get_post_meta($post_id)['st_3_rd_checkList_application'][0] ,
				                	// 			'ef' => get_post_meta($post_id)['st_3_rd_checkList_application'][0] 
				                	//  );

				                	?>
	                			<table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><label class="myRadio"><span class="radio_txt">Application</span><input type="checkbox" <?php echo (get_post_meta($post_id)['st_3_rd_checkList_application'][0] == 'Application' ) ?  'checked' : ''?> name="st_3_rd_checkList_application" value="Application"><span class="checkmark"></span></label></span>
					                        </td>
					                        <td>
					                          	<span><label class="myRadio"><span class="radio_txt">w-4</span><input type="checkbox" <?php echo (get_post_meta($post_id)['st_3_rd_checkList_ww'][0] == 'w-4' ) ?  'checked' : ''?> name="st_3_rd_checkList_ww" value="w-4"><span class="checkmark"></span></label></span>
					                        </td>
					                        <td>
					                          	<span><label class="myRadio"><span class="radio_txt">I-9</span><input type="checkbox" <?php echo (get_post_meta($post_id)['st_3_rd_checkList_ii'][0] == 'I-9' ) ?  'checked' : ''?> name="st_3_rd_checkList_ii" value="I-9"><span class="checkmark"></span></label></span>
					                        </td>
					                        <td>
					                          	<span><label class="myRadio"><span class="radio_txt">Waiver for Background Check</span><input type="checkbox" <?php echo (get_post_meta($post_id)['st_3_rd_checkLis_waivert'][0] == 'Waiver for Background Check' ) ?  'checked' : ''?> name="st_3_rd_checkLis_waivert" value="Waiver for Background Check"><span class="checkmark"></span></label></label></span>
					                        </td>
					                        <td>
					                          	<span><label class="myRadio"><span class="radio_txt">Deposit Slip</span><input type="checkbox" <?php echo (get_post_meta($post_id)['st_3_rd_checkList_deposit'][0] == 'Deposit Slip' ) ?  'checked' : ''?> name="st_3_rd_checkList_deposit" value="Deposit Slip"><span class="checkmark"></label></span></span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
	                			<table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><label class="myRadio"><span class="radio_txt">Nurse Checklist/ CNA Checklist</span><input type="checkbox" <?php echo (get_post_meta($post_id)['st_3_rd_checkList_nurse'][0] == 'Nurse Checklist/ CNA Checklist' ) ?  'checked' : ''?> name="st_3_rd_checkList_nurse" value="Nurse Checklist/ CNA Checklist"><span class="checkmark"></span></label></span>
					                        </td>
					                        <td>
					                          	<span><label class="myRadio"><span class="radio_txt">Policies and Procedures</span><input type="checkbox" <?php echo (get_post_meta($post_id)['st_3_rd_checkList_policies'][0] == 'Policies and Procedures' ) ?  'checked' : ''?> name="st_3_rd_checkList_policies" value="Policies and Procedures"><span class="checkmark"></span></label></span>
					                        </td>
					                        <td>
					                          	<span><label class="myRadio"><span class="radio_txt">Attendance Policy</span><input type="checkbox" <?php echo (get_post_meta($post_id)['st_3_rd_checkList_attendance'][0] == 'Attendance Policy' ) ?  'checked' : ''?> name="st_3_rd_checkList_attendance" value="Attendance Policy"><span class="checkmark"></span></label></span>
					                        </td>
					                        <td>
					                          	<span><label class="myRadio"><span class="radio_txt">Timekeeping Practices</span><input type="checkbox" <?php echo (get_post_meta($post_id)['st_3_rd_checkList_timekeeping'][0] == 'Timekeeping Practices' ) ?  'checked' : ''?> name="st_3_rd_checkList_timekeeping" value="Timekeeping Practices"><span class="checkmark"></span></label></span>
					                        </td>
					                        <td>
					                          	<span><label class="myRadio"><span class="radio_txt">Dress Code</span><input type="checkbox" <?php echo (get_post_meta($post_id)['st_3_rd_checkList_dress'][0] == 'Dress Code' ) ?  'checked' : ''?> name="st_3_rd_checkList_dress" value="Dress Code"><span class="checkmark"></span></label></span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
	                			<table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><label class="myRadio"><span class="radio_txt">Media Policy</span><input type="checkbox" <?php echo (get_post_meta($post_id)['st_3_rd_checkList_media'][0] == 'Media Policy' ) ?  'checked' : ''?> name="st_3_rd_checkList_media" value="Media Policy"><span class="checkmark"></span></label></span>
					                        </td>
					                        <td>
					                          	<span><label class="myRadio"><span class="radio_txt">Drug Policy</span><input type="checkbox" <?php echo (get_post_meta($post_id)['st_3_rd_checkList_drug'][0] == 'Drug Policy' ) ?  'checked' : ''?> name="st_3_rd_checkList_drug" value="Drug Policy"><span class="checkmark"></span></label></span>
					                        </td>
					                        <td>
					                          	<span><label class="myRadio"><span class="radio_txt">Abuse & Neglect</span><input type="checkbox" <?php echo (get_post_meta($post_id)['st_3_rd_checkList_abuse'][0] == 'Abuse & Neglect' ) ?  'checked' : ''?> name="st_3_rd_checkList_abuse" value="Abuse & Neglect"><span class="checkmark"></span></label></span>
					                        </td>
					                        <td>
					                          	<span><label class="myRadio"><span class="radio_txt">Health Assessment Additional information to send in</span><input type="checkbox" <?php echo (get_post_meta($post_id)['st_3_rd_checkList_health'][0] == 'Health Assessment Additional information to send in' ) ?  'checked' : ''?> name="st_3_rd_checkList_health" value="Health Assessment Additional information to send in">
												<span class="checkmark"></span></label></span>
					                        </td>
					                        <td>
					                          	<span><label class="myRadio"><span class="radio_txt">Driver’s License</span><input type="checkbox" <?php echo (get_post_meta($post_id)['st_3_rd_checkList_dress'][0] == 'Dress Code' ) ?  'checked' : ''?> name="st_3_rd_checkList_dress" value="Dress Code"><span class="checkmark"></span></label></span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
	                			<table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><label class="myRadio"><span class="radio_txt">Social Security Card</span><input type="checkbox" <?php echo (get_post_meta($post_id)['st_3_rd_checkList_media'][0] == 'Media Policy' ) ?  'checked' : ''?> name="st_3_rd_checkList_media" value="Media Policy">
													<span class="checkmark"></span></label></span>
					                        </td>
					                        <td>
					                          	<span><label class="myRadio"><span class="radio_txt">Tb Skin Test</span><input type="checkbox" <?php echo (get_post_meta($post_id)['st_3_rd_checkList_drug'][0] == 'Drug Policy' ) ?  'checked' : ''?> name="st_3_rd_checkList_drug" value="Drug Policy">
													<span class="checkmark"></span></label></span>
					                        </td>
					                        <td>
					                          	<span><label class="myRadio"><span class="radio_txt">NShot Records</span><input type="checkbox" <?php echo (get_post_meta($post_id)['st_3_rd_checkList_abuse'][0] == 'Abuse & Neglect' ) ?  'checked' : ''?> name="st_3_rd_checkList_abuse" value="Abuse & Neglect">
														<span class="checkmark"></span></label></span>
					                        </td>
					                        <td>
					                          	<span><label class="myRadio"><span class="radio_txt">Certificate or License Number</span><input type="checkbox" <?php echo (get_post_meta($post_id)['st_3_rd_checkList_certificate'][0] == 'Certificate or License Number' ) ?  'checked' : ''?> name="st_3_rd_checkList_certificate" value="Certificate or License Number">
													<span class="checkmark"></span></label></span>
					                        </td>
					                        <td>
					                          	<span><label class="myRadio"><span class="radio_txt">Certificate or License Number</span><input type="checkbox" <?php echo (get_post_meta($post_id)['st_3_rd_checkList_driver'][0] == 'Driver’s License' ) ?  'checked' : ''?> name="st_3_rd_checkList_driver" value="Driver’s License">
													<span class="checkmark"></span></label></span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
	                			<table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><label class="myRadio"><span class="radio_txt">CPR Certificate</span><input type="checkbox" <?php echo (get_post_meta($post_id)['st_3_rd_checkList_cpr'][0] == 'CPR Certificate' ) ?  'checked' : ''?> name="st_3_rd_checkList_cpr" value="CPR Certificate">
												<span class="checkmark"></span></label></span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>LPN/RN Competency and Skills checklist:</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
			                    <table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>First Name:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Last Name:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>M.I:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Date:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       		<?= (get_post_meta( $post_id,'',$single = false )['st_4_first_name'][0]);?></span>
					                       </td> 
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       		<?= (get_post_meta( $post_id,'',$single = false )['st_4_last_name'][0]);?></span>
					                       </td>
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       		<?= (get_post_meta( $post_id,'',$single = false )['st_4_mi'][0]);?></span>
					                       </td>
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       		<?= (get_post_meta( $post_id,'',$single = false )['st_4_date'][0]);?></span>
					                       </td> 
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="2"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span><strong>Please indicate the years of experience in each of the following areas:</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
			                    <table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="2"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                    <td>
			                    <table width="100%" border="1" cellpadding="10">
			                      	<tbody>
				                        <tr>
					                        <th>
					                        	<strong>Area</strong>
					                        </th>
					                        <th>
					                        	<strong>Experience</strong>
					                        </th>
					                        <th>
					                        	<strong>Area</strong>
					                        </th>
					                        <th>
					                        	<strong>Experience</strong>
					                        </th>
					                        <th>
					                        	<strong>Area</strong>
					                        </th>
					                        <th>
					                        	<strong>Experience</strong>
					                        </th>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>MED/SURG</span>
				                        	</td>
				                        	<td>
				                        		<?= (get_post_meta( $post_id,'',$single = false )['st_4_experience_1_rd_med_sugr'][0]);?>
				                        	</td>
				                        	<td>
				                        		<p>CCU</p>
				                        	</td>
				                        	<td>
				                        		<?= (get_post_meta( $post_id,'',$single = false )['st_4_experience_2_rd_ccu'][0]);?>
				                        	</td>
				                        	<td>
				                        		<span>PEDIATRICS</span>
				                        	</td>
				                        	<td>
				                        		<?= (get_post_meta( $post_id,'',$single = false )['st_4_experience_3_rd_pediatrics'][0]);?>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>TELEMETRY</span>
				                        	</td>
				                        	<td>
				                        		<?= (get_post_meta( $post_id,'',$single = false )['st_4_experience_1_rd_telemetry'][0]);?>
				                        	</td>
				                        	<td>
				                        		<p>CATH LAB</p>
				                        	</td>
				                        	<td>
				                        		<?= (get_post_meta( $post_id,'',$single = false )['st_4_experience_2_rd_cath_lab'][0]);?>
				                        	</td>
				                        	<td>
				                        		<span>L&D</span>
				                        	</td>
				                        	<td>
				                        		<?= (get_post_meta( $post_id,'',$single = false )['st_4_experience_3_rd_ld'][0]);?>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>ICU</span>
				                        	</td>
				                        	<td>
				                        		<?= (get_post_meta( $post_id,'',$single = false )['st_4_experience_1_rd_icu'][0]);?>
				                        	</td>
				                        	<td>
				                        		<p>ER</p>
				                        	</td>
				                        	<td>
				                        		<?= (get_post_meta( $post_id,'',$single = false )['st_4_experience_2_rd_er'][0]);?>
				                        	</td>
				                        	<td>
				                        		<span>CLINICS</span>
				                        	</td>
				                        	<td>
				                        		<?= (get_post_meta( $post_id,'',$single = false )['st_4_experience_3_rd_clininics'][0]);?>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>MICU/SICU</span>
				                        	</td>
				                        	<td>
				                        		<?= (get_post_meta( $post_id,'',$single = false )['st_4_experience_1_rd_micu_sicu'][0]);?>
				                        	</td>
				                        	<td>
				                        		<p>OR</p>
				                        	</td>
				                        	<td>
				                        		<?= (get_post_meta( $post_id,'',$single = false )['st_4_experience_2_rd_or'][0]);?>
				                        	</td>
				                        	<td>
				                        		<span>HOME HEALTH</span>
				                        	</td>
				                        	<td>
				                        		<?= (get_post_meta( $post_id,'',$single = false )['st_4_experience_3_rd_home_health'][0]);?>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>NICU</span>
				                        	</td>
				                        	<td>
				                        		<?= (get_post_meta( $post_id,'',$single = false )['st_4_experience_1_rd_nicu'][0]);?>
				                        	</td>
				                        	<td>
				                        		<p>PACU</p>
				                        	</td>
				                        	<td>
				                        		<?= (get_post_meta( $post_id,'',$single = false )['st_4_experience_2_rd_pacu'][0]);?>
				                        	</td>
				                        	<td>
				                        		<span>NSG HOMES</span>
				                        	</td>
				                        	<td>
				                        		<?= (get_post_meta( $post_id,'',$single = false )['st_4_experience_3_rd_nsg_homes'][0]);?>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>NEURO ICU</span>
				                        	</td>
				                        	<td>
				                        		<?= (get_post_meta( $post_id,'',$single = false )['st_4_experience_1_rd_neuro_icu'][0]);?>
				                        	</td>
				                        	<td>
				                        		<p>BURN UNIT</p>
				                        	</td>
				                        	<td>
				                        		<?= (get_post_meta( $post_id,'',$single = false )['st_4_experience_2_rd_burn_unit'][0]);?>
				                        	</td>
				                        	<td>
				                        		<span>PSYCHIATRY</span>
				                        	</td>
				                        	<td>
				                        		<?= (get_post_meta( $post_id,'',$single = false )['st_4_experience_3_rd_psychiatry'][0]);?>
				                        	</td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Experience Rating Scale:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                         	<span><strong>Instructions:</strong> Please check the column corresponding with your experience level for each competency and skill.</span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
			                    <table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                    <td>
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>General Skills:</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                		<table width="100%" border="0" cellpadding="10">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Computer Documentation</strong></span><br>
					                        	<span><?=get_post_meta($post_id)['st_5_ComputerDocumentation'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Med Administration- 5 Rights</strong></span><br>
					                        	<span><?=get_post_meta($post_id)['st_5_MedAdministration'][0]?></span>
					                        </td>
					                    </tr>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>CODE Status</strong></span><br>
					                        	<span><?=get_post_meta($post_id)['st_5_CODEStatus'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>BLS/CPR</strong></span><br>
					                        	<span><?=get_post_meta($post_id)['st_5_bls_cpr'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>ACLS/PALS</strong></span><br>
					                        	<span><?=get_post_meta($post_id)['st_5_acls_pals'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>IV Insertion</strong></span><br>
					                        	<span><?=get_post_meta($post_id)['st_5_ivinsertion'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Central Line Care</strong></span><br>
					                        	<span><?=get_post_meta($post_id)['st_5_CentralLineCare'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Infusion Pumps</strong></span><br>
					                        	<span><?=get_post_meta($post_id)['st_5_InfusionPumps'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>IV Med Administration</strong></span><br>
					                        	<span><?=get_post_meta($post_id)['st_5_IVMedAdministration'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Adult Dose Calculations</strong></span><br>
					                        	<span><?=get_post_meta($post_id)['st_5_AdultDoseCalculations'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Peds Dose Calculations</strong></span><br>
					                        	<span><?=get_post_meta($post_id)['st_5_PedsDoseCalculations'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Oxygen Administration</strong></span><br>
					                        	<span><?=get_post_meta($post_id)['st_5_OxygenAdministration'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Blood Draw</strong></span><br>
					                        	<span><?=get_post_meta($post_id)['st_5_BloodDraw'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Pain Assessment & Documentation</strong></span><br>
					                        	<span><?=get_post_meta($post_id)['st_5_PainAssessmentandDocumentation'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Universal Precautions</strong></span><br>
					                        	<span><?=get_post_meta($post_id)['st_5_UniversalPrecautions'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Blood Borne Precautions</strong></span><br>
					                        	<span><?=get_post_meta($post_id)['st_5_bloodBorneprecaution'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Droplet Precautions</strong></span><br>
					                        	<span><?=get_post_meta($post_id)['st_5_dropletprecaution'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Reverse Isolation</strong></span><br>
					                        	<span><?=get_post_meta($post_id)['st_5_ReverseIsolation'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>PPE</strong></span><br>
					                        	<span><?=get_post_meta($post_id)['st_5_PPE'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Dressing Changes/Drain</strong></span><br>
					                        	<span><?=get_post_meta($post_id)['st_5_DressingChanges_Drain'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Blood Product Administration</strong></span><br>
					                        	<span><?=get_post_meta($post_id)['st_5_bloodproductadmin'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Internal Feeding</strong></span><br>
					                        	<span><?=get_post_meta($post_id)['st_5_InternalFeeding'][0]?></span>
					                        </td>
					                    </tr>
				                    </tbody>
		                    	</table>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                    <td>
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Genito-Urinary Renal:</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                		<table width="100%" border="0" cellpadding="10">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Foley/ Straight Catheter Insertion</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_5_Foley_StraightCatheterInsertion'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Suprapubic/Nephrostomy</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_5_Suprapubic_Nephrostomy'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Bladder Irrigation</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_5_Bladder_Irrigation'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Urine Dipsticks</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_5_Urine_Dipsticks'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Bladder Scanner Use</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_5_Bladder_Scanner_Use'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Electrolyte Imbalance Replacement</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_5_Electrolyte_Imbalance_Replacement'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Care Of Patients With</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_5_Care_of_Patients_with'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Renal Failure</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_5_Renal_Failure'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Renal Transplant</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_5_Renal_Transplant'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Hemodialysis</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_5_Hemodialysis'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Nephrectomy</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_5_Nephrectomy'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>TURP</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_5_TURP'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Radical Prostatectomy</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_5_Radical_Prostatectomy'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Peritonical Dialysis</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_5_Peritonical_Dialysis'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Renal Calculi</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_5_Renal_Calculi'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Shunts And Fistulas</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_5_Shunts_and_Fistulas'][0] ?></span>
					                        </td>
					                    </tr>
				                    </tbody>
		                    	</table>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                    <td>
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Cardio Vascular</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                		<table width="100%" border="0" cellpadding="10">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>EKG/Arrhythmia Interpretation</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_arrhythmia'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Pacemaker-Permanent</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Pacemaker_Permanent'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Pacemaker Temp</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_PacemakerTemp'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Preform 12-Lead EKG</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Preform_12_lead_EKG'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>A Line Set Up Draw Gases</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_A_line_set_up_Draw_Gases'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>CVP Readings</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_CVP_Readings'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Swan Ganz Reading</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Swan_Ganz_Reading'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>IABP</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_IABP'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Defib/Cardioversion</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Defib_Cardioversion'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Chest Tubes</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Chest_Tubes'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Cardiac Drugs</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Cardiac_Drugs'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Dopamine/Dobutamine</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Dopamine_Dobutamine'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Brevibloc</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Brevibloc'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Lidocaine</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Lidocaine'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Nipride</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Nipride'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Nitroglycerine</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Nitroglycerine'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Heparin</strong></span><br>
					                        	<span>com<?= get_post_meta($post_id)['st_6_Heparin'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Epi/Norepinephrine</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Epi_Norepinephrine'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Adenosine</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Adenosine'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Natrecor</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Natrecor'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Bretyllium</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Bretyllium'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Verapamil</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Verapamil'][0] ?></span>
					                        </td>
					                    </tr>
				                    </tbody>
		                    	</table>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                    <td>
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Cardio Vascular</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                		<table width="100%" border="0" cellpadding="10">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Care Of Patients With</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Care_of_patients_With'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Angina/MI</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Angina_MI'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>CHF</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_CHF'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Post CABG</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Post_CABG'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Pre Post Cardiac Cath</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Pre_Post_Cardiac_Cath'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Cardio Hypovolemic Shock</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Cardio_Hypovolemic_Shock'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Aneurysm</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Aneurysm'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Heart Transplant</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Heart_Transplant'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Pre Post Open Heart Surgery</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Cardio_Hypovolemic_Shock'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Fem-Pop Bypass</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Fem_Pop_Bypass'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Hypertensive Crisis</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_6_Hypertensive_Crisis'][0] ?></span>
					                        </td>
					                    </tr>
				                    </tbody>
		                    	</table>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                    <td>
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>GASTRO INTESTINAL</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                		<table width="100%" border="0" cellpadding="10">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>NG Tube Insertion</strong></span><br>
					                        	<span> <?= get_post_meta($post_id)['st_7_NG_Tube_Insertion'][0]?> </span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Gastrostomy Ileostomy Care</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Gastrostomy_Ileostomy_Care'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Feeding Pumps</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Feeding_Pumps'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Bowl Preps Enemas</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Bowl_Preps_Enemas'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Care Of Patients With</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Care_of_Patients_with'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>G.I. Bleed</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_G_I_Bleed'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Pancreatitis</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Pancreatitis'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Hepatitis</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Hepatitis'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Liver Cirrhosis</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Liver_Cirrhosis'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Bowel Surgery</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Bowel_Surgery'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Bowel Obstruction</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Bowel_Obstruction'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Paralitic Ileus</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Paralitic_Ileus'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Whipple Procedure</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Whipple_Procedure'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Liver Transplant</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Liver_Transplant'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                    	<td>
					                        	<span style="font-size: 16px;"><strong>Colostomy/Ileostomy Care</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Colostomy_Ileostomy_Care'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>E.R.C.P</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_E_R_C_P'][0]?></span>
					                        </td>
					                    </tr>				                    
					                </tbody>
		                    	</table>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                    <td>
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>PULMONARY</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                		<table width="100%" border="0" cellpadding="10">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Differentiate Breathing Sounds</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Differentiate_Breathing_Sounds'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Arterial Puncture</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Arterial_Puncture'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>ABG Interpretation</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_ABG_Interpretation'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Oral-Pharyngcal-ET Suctioning</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Oral_Pharyngcal_ET_Suctioning'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Ventilator Management</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Ventilator_Management'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>ET Intubation Extubation</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_ET_Intubation_Extubation'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Incentive Spirometer</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Incentive_Spirometer'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Chest Tube/ Pleuravac</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Chest_Tube_Pleuravac'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Care Of Patients With</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Care_of_Patients_with_1'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>COPD</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_COPD'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>ARDS</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_ARDS'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Pneumonia</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Pneumonia'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Plum Embolism</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Plum_Embolism'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Thoracic Surgery</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Thoracic_Surgery'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Pneumo Hemothorax</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Pneumo_Hemothorax'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Tuberculosis</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Tuberculosis'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Inhalation Injuries</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_7_Inhalation_Injuries'][0]?></span>
					                        </td>
					                    </tr>				                    
					                </tbody>
		                    	</table>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                    <td>
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>ORTHOPEDIC</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                		<table width="100%" border="0" cellpadding="10">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>ROM Exercises</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_ROM_Exercises'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Circulation Assessment</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Circulation_Assessment'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Cervical Collars</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Cervical_Collars'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Skeletal Tractions</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Skeletal_Tractions'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>CMP</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_CMP'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Polar Ice</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Polar_Ice'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Care Of Patients With</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Care_of_Patients_with'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Arthroscopic Surgery (Pre-Post)</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Arthroscopic_Surgery_Pre_Post'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Total Joint Replacement (Pre-Post)</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Total_Joint_Replacement_Pre_Post'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Laminectomy</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Laminectomy'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Spika Cast</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Spika_Cast'][0]?></span>
					                        </td>
					                    </tr>				                    
					                </tbody>
		                    	</table>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                    <td>
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>NEURO</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                		<table width="100%" border="0" cellpadding="10">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Neuro Assessment</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Neuro_Assessment'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Glasgow Coma Scale</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Glasgow_Coma_Scale'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Seizure Precautions</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Seizure_Precautions'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>ICP Monitoring</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_ICP_Monitoring'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Assist With Lumbar Puncture</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Assist_with_Lumbar_Puncture'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>TENS Unit</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_TENS_Unit'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Halo Traction/Stryker Frame</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Halo_Traction_Stryker_Frame'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Care Of Patients With</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Care_of_Patients_with'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>CVA</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_CVA'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Seizure Disorder</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Seizure_Disorder'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Craniotomy</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Craniotomy'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Head Spinal Cord (Injury)</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Head_Spinal_Cord'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Neurosurgery (Pre-Post)</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Neurosurgery_Pre_Post'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>DT's</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_DT_s'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Administration Of The Following</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Administration_of_the_Following'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Dilantin</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Dilantin'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Phenobarbital</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Phenobarbital'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Neuro- Muscular Blocking Agent</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Neuro_Muscular_Blocking_Agent'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Steroids</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_8_Steroids'][0]?></span>
					                        </td>
					                    </tr>				                    
					                </tbody>
		                    	</table>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                    <td>
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>ENDOCRINE</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                		<table width="100%" border="0" cellpadding="10">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Diabetic Management</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_9_Diabetic_Management'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Diabetic Teaching</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_9_Diabetic_Teaching'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Diabetic Foot Nail and Skin Care</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_9_Diabetic_Foot_Nail_and_Skin_Care'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Insulin Administration</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_9_Insulin_Administration'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Accucheck/Glucometer</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_9_Accucheck_Glucometer'][0]?></span>
					                        </td>
					                    </tr>				                    
					                </tbody>
		                    	</table>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                    <td>
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>GYNECOLOGIC</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                		<table width="100%" border="0" cellpadding="10">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Self Breast Exam</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_9_Self_Breast_Exam'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Assist Perform GYN Exam PAP</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_9_Assist_Perform_GYN_Exam_PAP'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Care Of Patients With</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_9_Care_of_Patients_with'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Mastectomy</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_9_Mastectomy'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Hysterectomy</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_9_Hysterectomy'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Tube Ligation</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_9_Tube_Ligation'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Ectopic Pregnancy</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_9_Ectopic_Pregnancy'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Abruptio Placenta</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_9_Abruptio_Placenta'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Pro Eclampsia</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_9_Pro_Eclampsia'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Episiotomy</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_9_Episiotomy'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Assist With Vag. Delivery</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_9_Assist_with_Vag_Delivery'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Assist/Circulate In C-Section</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_9_Assist_Circulate_in_C_Section'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Oxytocin Induction</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_9_Oxytocin_Induction'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Mag Sulfate Rx</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_9_Mag_Sulfate_Rx'][0]?></span>
					                        </td>
					                    </tr>				                    
					                </tbody>
		                    	</table>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                    <td>
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>HOME HEALT</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                		<table width="100%" border="0" cellpadding="10">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Medicare Documentation</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_10_Medicare_Documentation'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Case Management</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_10_Case_Management'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Med Set Up</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_10_Med_Set_Up'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Ventilators</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_10_Ventilators'][0]?></span>
					                        </td>
					                    </tr>				                    
					                </tbody>
		                    	</table>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                    <td>
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>NEONATAL PEDIATRIC</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                		<table width="100%" border="0" cellpadding="10">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Calc. Of Neonatal Dosages</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_10_Calc_of_Neonatal_Dosages'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>APGAR Scores</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_10_APGAR_Scores'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Collect Cord Blood</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_10_Collect_Cord_Blood'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Eye Prophylaxis</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_10_Eye_Prophylaxis'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Suction Therapy</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_10_Suction_Therapy'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Phototherapy</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_10_Phototherapy'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Croup Tent</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_10_Croup_Tent'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Apnea Monitor</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_10_Apnea_Monitor'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>CPR Infant Child</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_10_CPR_Infant_Child'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Care Of Patient With</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_10_Care_of_Patient_with'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Schizophrenia</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_10_Schizophrenia'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Bipolar</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_10_Bipolar'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Substance Abuse</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_10_Substance_Abuse'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Suicidal Precautions</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_10_Suicidal_Precautions'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Neurosurgery</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_10_Neurosurgery'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>DT's</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_10_DT_s2'][0]?></span>
					                        </td>
					                    </tr>				                    
					                </tbody>
		                    	</table>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                    <td>
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Licenses:</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>State:</strong></span>
					                         </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Number:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Expiration Date:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          		<?= (get_post_meta( $post_id,'',$single = false )['st_11_licenses_State'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_11_licenses_Number'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_11_licenses_Expiration_Date'][0]);?></span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Certifications:</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>Name:</strong></span>
					                         </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Date:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Name:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_11_certifications_Name_1_1'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_11_certifications_Date_1_1'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_11_certifications_Name_1_2'][0]);?></span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>Date:</strong></span>
					                         </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Name:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Date:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_11_certifications_Date_2_1'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_11_certifications_Name_2_1'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_11_certifications_Date_2_2'][0]);?></span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Competency Checklist Certified Nursing Assistant:</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>Name:</strong></span>
					                         </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Date:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_12_Name'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_12_Date'][0]);?></span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 20px;"><strong>Rating Scale:</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<ol>
													<li>No previous experience</li>
													<li>Previous training, but no personal hands-on experience</li>
													<li>Previous training / hands-on experience. Need additional practice with supervisor</li>
													<li>Previous training and experience</li>
												</ol>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
			                    <table width="100%" border="1" cellpadding="10">
			                      	<tbody>
				                        <tr>
					                        <th>
					                        	<strong>SKILLS</strong>
					                        </th>
					                        <th>
					                        	<strong>Rating</strong>
					                        </th>
					                        <th>
					                        	<strong>SKILLS</strong>
					                        </th>
					                        <th>
					                        	<strong>Rating</strong>
					                        </th>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>CPR</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_CPR'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Turning and positioning patients</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Turning_andpositioning_patients'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Vital signs (TPR, BP)</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Vital_signs_TPR_BP'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Disease processes</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Disease_processes'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Set up and feed patient meals</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Set_up_and_feed_patient_meals'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Aspiration precautions</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Aspiration_precautions'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Make up empty or occupied beds</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Make_up_empty_or_occupied_beds'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Assist patient with oxygen or pulse ox</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Assist_patient_with_oxygen_ox'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Assist patient with ambulation</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Assist_patient_with_ambulation'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Knowledge of infection control in home</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Knowledge_of_infection_control_in_home'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Partial bed bath / Shower scrub</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Partial_bed_bath_Shower_scrub'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Specimen collection</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Specimen_collection'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Complete bed bath</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Complete_bed_bath'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Monitor and record intake and output</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Monitor_and_record_intake_and_output'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Oral care</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Oral_care'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Pain management</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Pain_management'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Foot care / Nail care</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Foot_care_Nail_care'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Behavior management</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Behavior_management'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Bowel care</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Bowel_care'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Age specific communication</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_st_12_Age_specific_communication'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Bladder care</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Bladder_care'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Basic nutrition and meal planning</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Basic_nutrition_and_meal_planning'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Catheter care</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Catheter_care'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Disaster planning and preparedness</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Disaster_planning_and_preparedness'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Toileting / Incontinence management</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Toileting_Incontinence_management'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Cardiac / Diabetic meal planning</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Basic_nutrition_and_meal_planning'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Foley care</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Foley_care'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Care of the dying patient</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Care_of_the_dying_patient'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Skin care</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Skin_care'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Scales / Weights</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Scales_Weights'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Dry dressing changes</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Dry_dressing_changes'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Post-mortem care</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Post_mortem_care'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Hair care / Shampoo / Roller sets</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Hair_care_Shampoo_Roller_sets'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Abuse and neglect reporting procedure</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Abuse_and_neglect_reporting_procedure'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Assist client with medications/reminders</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Assist_client_with_medications_reminders'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Knowledge of potential home violence</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Knowledge_of_potential_home_violence'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Set up enteral or tube feedings</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Set_up_enteral_or_tube_feedings'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Prepare exam rooms</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Prepare_exam_rooms'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Take an EKG</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Take_an_EKG'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Infection control in the home setting</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Infection_control_in_the_home_setting'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Assist client with use of glucometer</span>
				                        	</td>
											<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Assist_client_with_use_of_glucometer'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span><strong>Safely operate the following medical equipment:</strong></span>
				                        	</td>
				                        	<td>
				                        		<span></span>
				                        	</td>
				                        	<td>
				                        		<ul>
							    					<li>Hand washing</li>
							    					<li>Protective equipment</li>
							    					<li>Equipment cleaning</li>
							    					<li>Exposure plan</li>
							    				</ul>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Hand_washing_Protective_equipment'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Pulse oximeter</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Pulse_oximeter'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Documentation and reporting of client</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Documentation_and_reporting_of_client'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Shampoo tray for bed bound client</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Shampoo_tray_for_bed_bound_client'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Housekeeping</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Housekeeping'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Wheelchair, semi and electric bed</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Wheelchair_semi_and_electric_bed'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Linen change / Wash clothing</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Linen_change_Wash_clothing'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Home glucometer</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Home_glucometer'][0]?></span>
				                        	</td>
				                        	<td>
				                        		<p>Use of shower bench / Chair / bsc</p>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Use_shower_bench_Chair_bsc'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Walker / Single point / Quad cane</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Walker_Single_point_Quad_cane'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Hoyer lift / Trapeze</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Hoyer_lift_Trapeze'][0]?></span>
				                        	</td>
				                        </tr>
				                        <tr style="text-align: center;">
				                        	<td>
				                        		<span>Electronic thermometer</span>
				                        	</td>
				                        	<td>
				                        		<span><?= get_post_meta($post_id)['st_12_Electronic_thermometer'][0]?></span>
				                        	</td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Policies and Procedures</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
				                        	<td>
				                        		<ol>
													<li>TEAMWORK, Honesty and accountability</li>
													<li>Arrive at the facility 15 minutes before your scheduled shift. After being late 3 times you will be suspended 3 shifts. After 3 suspensions its ground termination</li>
													<li>Proper dress attire= <strong>SCRUBS.</strong></li>
													<li>Good hygiene. <strong>PLEASE.</strong> At all times.</li>
													<li>If there is a <strong>SCHEDULING</strong> conflict, concern, or question call the office <strong><a href="tel:6205213607">(620)521-3607</a></strong> or email <strong><a href="mailto:TLCAdvancednsg@gmail.com">TLCAdvancednsg@gmail.com</a></strong> TLCAdvancednsg@gmail.com We will send mass messages or call you directly when shifts become available. Please call with any questions or concerns.</li>
													<li>If there is a paperwork, timesheet, or payroll/paycheck question, or conflicts, call Jessica  <strong><a href="tel:8063356325">(806) 335-6325</a></strong></li>
													<li>If there is a scheduling conflict when you arrive at a facility. <strong>ALWAYS</strong> call <strong>BEFORE</strong> leaving the facility</li>
													<li>If you are sick <strong>TEXT MESSAGES</strong> will <strong>NOT</strong> be allowed as a Call in. <strong>CALLS</strong> are the only accepted call in. If you get sick while at facility Call <strong>BEFORE</strong> leaving facility. </li>
													<li><strong>NO CELL PHONES IN FACILITIES</strong> This is a common courtesy asked of us from almost every facility</li>
													<li>After 3 call ins or after 3 last-minute shift cancellation, a doctor note will be required before you can work another shift.</li>
													<li><strong>One</strong> timesheet should be filled out, per <strong>facility,</strong> per pay period. A copy should be left at the facility at end of every shift. Ex. You work at <strong>Two</strong> <u>different</u> facilities in one week you should turn in <strong>Two</strong> timesheets for payroll purposes.</li>
													<li><strong>ANY FORM</strong> of insubordination is grounds for termination. A a Facility, in a text message, or phone call, it will <strong>not</strong> be tolerated.</li>
												</ol>
				                        	</td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
<!-- 				                        <tr>
					                        <td>
					                          	<span><strong>Employee Signature:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Date:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;"></span>
					                       </td> --> 
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_13_date'][0]);?></span>
					                       </td> 
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Attendance Policy</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
				                        	<td>
				                        		<p>TLC Advanced Nursing LLC. Strives to provide the best qualified and reliable staff to our Clients/ Facilities. In order to continue offering competitive pay rates and bonuses, we need to provide excellent service to our Facilities.</p>
				                        		<p>An agency (TLC Advanced) is called into a facility when they are experiencing staff shortages. Schedules are flexible and you are able to select your own days of work, therefore you are expected to be present at any shift you have picked-up and been confirmed for. Attendance issues will not be tolerated and are grounds for termination. </p>
				                        		<p>Attendance issues include, but not limited to:</p>
				                        		<ul>
													<li>No Call No Show (NCNS)</li>
													<li>Calling In</li>
													<li>Arriving late to a shift</li>
													<li>Asking to leave a shift early</li>
													<li>Calling into a shift without 5-hour notice</li>
													<li>Taking longer than authorized breaks</li>
												</ul>
				                        	</td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>No Call No Show Policy</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
				                        	<td>
				                        		<p>NCNS- Missing a confirmed shift without notice to employer (Jeanetta Brownlee).</p>
				                        		<p>A No Call No Show will result in automatic reduction of pay; all hours worked in that pay period will be reduced to <strong>minimum wage</strong> ($7.25). </p>
				                        		<p>To keep a <strong>NCNS</strong> off your Employment record you <u>must</u> call-in to your employer (Jeanetta Brownlee, 620-521-3607) a text message or voicemail will not be accepted. </p>
				                        		<p>I have read and understood the above Information.</p>
				                        	</td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
<!-- 				                        <tr>
					                        <td>
					                          	<span><strong>Employee Signature:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Date:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;"></span>
					                       </td>  -->
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       		<?= (get_post_meta( $post_id,'',$single = false )['st_14_date'][0]);?></span>
					                       </td> 
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Timekeeping Practices</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
				                        	<td>
				                        		<p>I understand that as an employee of TLC Advanced Nursing, LLC, I have certain responsibilities to make sure that my time record is accurate. I understand that I <u>must</u>:</p>
				                        		<ol>
													<li>Clock in and out at the start and the end of my shift</li>
													<li>Clock in and out for meals</li>
													<li>Obtain approval in advance from my supervisor before working <strong>ANY</strong> overtime</li>
													<li>Never falsify my time records or those of any employee</li>
													<li>Never work off the clock</li>
													<li>Clock in no more than 7min, before your shift begins and clock out no more than 7 mins after your shift ends</li>
													<li>Promptly notify my supervisor if any changes to my time record are necessary</li>
													<li>
														Fill out <strong>One</strong> timesheet, per <strong>facility</strong>, per pay period. A copy should be left at the facility at end of every shift
														<ul>
															<li>Ex. You work at <strong>Two</strong> <u>different</u> facilities in one week you should turn in <strong>Two</strong> completed timesheets for payroll purposes.</li>
														</ul>
													</li>
													<li>Have a <ul>nurse</ul> verify your timesheet at the end of every shift</li>
													<li>
														Email timesheet to <a href="mailto:TLCAdvancedts@gmail.com">TLCAdvancedts@gmail.com</a> by 8am Sunday
														<ul>
															<li>Failure to submit timesheets will delay your pay to the following week</li>
														</ul>
													</li>
												</ol>
												<p>I understand that if I fail to follow these timekeeping rules, I may receive discipline up to and including discharge from employment.</p>
				                        	</td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
<!-- 				                        <tr>
					                        <td>
					                          	<span><strong>Employee Signature:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Date:</strong></span>
					                        </td>
				                        </tr> -->
				                        <tr>
<!-- 					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;"></span>
					                       </td>  -->
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       		<?= (get_post_meta( $post_id,'',$single = false )['st_15_date'][0]);?></span>
					                       </td> 
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Policy for Holiday Pay</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
				                        	<td>
				                        		<p>Holiday pay is received, when you have worked a holiday listed below. <strong>Holiday pay is time and a quarter.</strong></p>
				                        		<p><strong>Holidays:</strong></p>
				                        		<ol>
													<li>Christmas Eve: Dec 24 (10pm-6am)</li>
													<li>Christmas Day: Dec 25</li>
													<li>Thanksgiving Day: Nov 26</li>
													<li>New Year's Eve: Dec 31 (10pm-6am)</li>
													<li>New Year's Day: Jan 1</li>
													<li>Labor Day: First Monday of September</li>
													<li>Independence Day: July 4</li>
													<li>Memorial Day: Last Monday in May</li>
												</ol>
												<p><strong>If you do not work on these holidays, you will not receive holiday pay!</strong></p>
				                        	</td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
<!-- 					                        <td>
					                          	<span><strong>Employee Signature:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td> -->
					                          	<span><strong>Date:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
<!-- 					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;"></span>
					                       </td> 
					                       <td width="20">&nbsp;</td> -->
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;"><?= get_post_meta( $post_id,'',$single = false )['st_16_date'][0] ?></span>
					                       </td> 
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Dress Code</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
				                        	<td>
				                        		<p>Employees are expected to maintain a good personal appearance and to give consideration to neatness and cleanliness. Employees should always dress in a manner benefitting the job, with consideration to the needs of the company, co-workers, and safety. The recommended attire is <strong>Scrubs</strong>, one company T-shirt will be provided and can be worn while working. </p>
				                        		<p><strong>Clothing that is not allowed but not limited to:</strong></p>
				                        		<ul>
													<li>No jeans</li>
													<li>Shirts with language or graphics that are vulgar, sexually explicit or offensive.</li>
													<li>Attire that is revealing or provocative</li>
													<li>Opened toe shoes ex. Flip-flops or any type of loose footwear</li>
													<li>No t-shirts allowed</li>
													<li>No hoodies allowed while working</li>
												</ul>
												<p><strong>Tattoos</strong></p>
												<ul>
													<li>Some facilities will allow tattoos, but If a facility wants your tattoos covered up, please do so. If you have a tattoo with vulgar print it must be covered.</li>
												</ul>
												<p><strong>Hair</strong></p>
												<ul>
													<li>Facilities require your hair pulled up and out of your face</li>
													<li>No colored hair such as blue, green, pink, yellow and so on</li>
													<li>Facial hair should be maintained and clean</li>
												</ul>
												<p><strong>Piercings</strong></p>
												<ul>
													<li>If the facility does not approve you will be asked to remove it, please do so.</li>
												</ul>
												<p><strong>Fingernails</strong></p>
												<ul>
													<li>Keep clean, trimmed, and well maintained</li>
													<li>No Acrylics, or polish</li>
												</ul>
												<p><strong>Jewelry</strong></p>
												<ul>
													<li>Is allowed unless the facility asks you to remove it, if so please do.</li>
												</ul>
												<p>Remember you are there to help out the facilities in a time of need. Conduct yourself professionally as your actions reflect other employees and the company. If you have any questions, please don't hesitate to ask.</p>
				                        	</td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
<!-- 				                        <tr>
					                        <td>
					                          	<span><strong>Employee Signature:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Date:</strong></span>
					                        </td>
				                        </tr> -->
				                        <tr>
<!-- 					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;"></span>
					                       </td>  -->
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       		<?= (get_post_meta( $post_id,'',$single = false )['st_17_date'][0]);?></span>
					                       </td> 
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Social Media Policy Acknowledgment</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
				                        	<td>
				                        		<p>Social Media- includes but is not limited to, personal blogs and other websites, Facebook, LinkedIn, Myspace, twitter. YouTube or other sites that provide two-way communications where ideas, opinions, or conversations are shared in a public forum. </p>
				                        		<ul>
													<li>Must adhere to the same federal and State compliance requirements that TLC follows. For example: Protected Health Information (PHI) and HIPPA.</li>
													<li>May not communicate or upload on any social media site any PHI, pictures or images of residents or resident's property.</li>
													<li>Use personal emails address (not company email) for any social media applications</li>
													<li>Make it clear he/she is speaking for themselves not on behalf of the company</li>
													<li>Be professional, use good judgement and be accurate and honest in your communication.</li>
													<li>Remember social media is not the proper place to voice concerns or issues with the company, supervisors or co-workers. Concerns should be addressed to the owner of the agency.</li>
													<li>Posts that contain errors, omissions or unprofessional language may result in liability</li>
													<li>Must refrain from defaming or slander of the company. This may lead to disciplinary action, up to and including termination.</li>
													<li>May not use personal electronic devises, post on personal blog, web page or participation in personal social media while on work time.</li> 
													<li>TLC strongly discourages â€œfriendingâ€ residents on social media</li>
													<li>TLC rules that prohibit disclosure of confidential, proprietary, trade secret information apply in full to blogs to social media.</li>
													<li>TLC rules that prohibit discrimination and harassment apply in full to blogs and social media. </li>
													<li>TLC reserves the right to monitor all blogs, social media sites and other internet-based sources for the purpose of protecting its interest and ensuring compliance with TLC policy.</li>
													<li>Employees should report any blog or online communication which violates this or other companies' policies to his/her immediate supervisor.</li> 
													<li>Failure to following this policy may result in disciplinary action, up to and including termination of employment. </li>
												</ul>
				                        	</td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
<!-- 				                        <tr>
					                        <td>
					                          	<span><strong>Employee Signature:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Date:</strong></span>
					                        </td>
				                        </tr> -->
				                        <tr>
<!-- 					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;"></span>
					                       </td>  -->
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       		<?= (get_post_meta( $post_id,'',$single = false )['st_18_date'][0]);?></span>
					                       </td> 
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Drug Free Workplace Policy</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
				                        	<td>
				                        		<p>I acknowledge that I received a copy of the company's drug free workplace policy with a schedule of any prohibited drugs. I also acknowledge that I have been informed that the company drug free awareness program that meets requirement of the drug free workplace act of 1988. I have been informed of (1) the dangers of drug abuse in the workplace; the company's policy of maintaining a drug free workplace; and (3) the penalties that may be imposed upon employees for drug abuse violations. </p>
				                        		<p>I have also been informed that I must, as a condition of employment, abided by the terms of the TLC Advanced Nursing, LLC Drug free work place policy, and that I must report any criminal drug statute conviction committed in the workplace to my supervisor within five (5) days of such conviction. I understand and agree that I may be subjected to substance abuse testing and searches in accordance with this and other applicable company polices. I understand that I should fall to abide by this policy, including but not limited to submitting to a substance abuse test or search, that I may be discharged.</p>
				                        		<p>I have read this policy; I understand what is required of me under the policy and agree to abide by it.</p>
				                        	</td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
<!-- 				                        <tr>
					                        <td>
					                          	<span><strong>Employee Signature:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Date:</strong></span>
					                        </td>
				                        </tr> -->
				                        <tr>
<!-- 					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;"></span>
					                       </td>  -->
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       		<?= (get_post_meta( $post_id,'',$single = false )['st_19_date'][0]);?></span>
					                       </td> 
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Abuse, Neglect, and Exploitation</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
				                        	<td>
				                        		<p>TLC Advanced Nursing, LLC has <strong>NO</strong> tolerance for abuse, neglect, and exploitation towards a residents/patient. Every resident within a facility has the right to be safe from verbal, sexual, physical, and mental or emotional abuse corporal punishment and involuntary seclusion is not acceptable.</p>
				                        		<p>Residents/Patients must be safe from abuse from facility staff, volunteers, other staffing agencies, residents within facility, Family, and all other individuals.</p>
				                        		<p>Abuse is defined as the intention of causing injury, intimidation or punishment that may cause physical harm, and mental suffering. Abuse can include any act that is intentional or reckless that could deprive patients of all care to maintain physical and mental well-being.</p>
				                        		<p><u>Types of Abuse and Neglect</u></p>
				                        		<p><u>Verbal Abuse:</u> Oral, Written, or Gestures that willfully includes disparaging and derogatory terms residents or their families, or within their hearing distance, regardless of their age, ability to comprehend, or disability. Examples of verbal include but are not limited to: threats of harm; saying things to frighten a resident, such as telling a resident that he/she will never be able to see his/her family again. This also includes or might reasonably be experienced to result in fear or emotional or mental distress to a resident. Examples: Saying things like; â€œif you don't quit hollering. I will not come help you for the rest of my shift.â€ This would cause a resident to reasonable fear of not being cared for</p>
				                        		<p><u>Sexual Abuse:</u> Any sexual act with a resident when the resident does not consent or when the other person knows or should know that the resident is incapable or resisting or declining consent to the sexual act due to mental deficiency or disease or due to fear of retribution or hardship. This includes but is not limited to: sexual coercion, or sexual assault.:</p>
				                        		<p><u>Physical Abuse:</u> Includes hitting, slapping, pinching, kicking, physical, or chemical restraints, and isolation. Physical abuse includes controlling behavior through corporal punishment. This also includes using unreasonable use of physical restraint, isolation or medication that harms or is likely to harm a resident that is being used for the convenience of the staff in conflict with a physician's orders or as a substitute for treatment, except where such conduct or physical restraint is it furtherance of the health and safety of the resident or other residents.</p>
				                        		<p><u>Involuntary Seclusion:</u> Includes of separation a resident from the other residents or form his/her room or confinement to his/her room against the residents will or the will of the resident's legal representative. Emergency or short term monitored separation from other residents will not be a considered involuntary seclusion and may be permitted if used for a limited period of time as a therapeutic intervention or reduce agitation until professional staff can develop a plan of care to meet the resident's needs.</p>
				                        		<p><u>Neglect:</u> Includes the failure or omission by one's self, caretaker, or another person with a duty to provide goods or services which are reasonably necessary to ensure safety and wellbeing and to avoid physical or mental harm or illness.</p>
				                        		<p><u>Mental Abuse:</u> Includes but is not limited to: humiliation, harassment, threats of punishment or deprivation. Any action that would be expected to result in fear or emotional or mental distress to a resident/ patient.</p>
				                        		<p><u>Exploitation:</u> Includes the misappropriation of resident property or intentionally taking unfair advantage of a resident physical or financial resources for another individual's personal or financial advantage by the use of undue influence, coercion, harassment, duress, deception, false representation, or false pretense by a caretaker or another person.</p>
				                        		<p><u><strong>IF ABUSE OCCURS</strong></u></p>
				                        		<ol>
													<li>Remove resident from abusive situation and ensure resident's safety.</li>
													<li>Report immediately by calling the Administrator and DON.</li>
													<li>Fill out proper documentation.</li>
													<li>Report to state within 24 hours of the incident.</li>
													<li>Removal of staff member(s) who allegedly abused the resident</li>
												</ol>
											<p>As an employee of TLC Advanced Nursing, LLC. I understand the significance of preventing and reporting ABUSE, NEGLECT, AND EXPLOITATION. I have read the above policy and understand its contents. </p>
				                        	</td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
<!-- 				                        <tr>
					                        <td>
					                          	<span><strong>Employee Signature:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Date:</strong></span>
					                        </td>
				                        </tr> -->
				                        <tr>
<!-- 					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;"></span>
					                       </td>  -->
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       		<?= (get_post_meta( $post_id,'',$single = false )['st_20_date'][0]);?></span>
					                       </td> 
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Health Assessment Form</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
			                    <table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>Name:</strong></span>
					                         </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Emergency Contact:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Date of Birth:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_21_Name'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_21_Emergency_Contact'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_21_Date_of_Birth'][0]);?></span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>Relationship:</strong></span>
					                         </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Contact Phone Numbe:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_21_Relationship'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_21_Contact_Phone_Number'][0]);?></span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Health History Assessment:</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
			                    <table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<table width="100%" border="0" cellpadding="10">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Have You Been Diagnosed With A Contagious Disease Within The Last Year?</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Health_Assessment_1'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Do You Have Allergies?</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Health_Assessment_2'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Do You Have Any Problems With Latex?</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Health_Assessment_3'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Do You Have Any Unexplained Pain Or Tingling From The Hands To Shoulder?</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Health_Assessment_4'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Do You Have Any Back Or Neck Pain?</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Health_Assessment_5'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Have You Ever Been Treated For Back Or Neck Pain?</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Health_Assessment_6'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Have You Had Chicken Pox Or Shingles?</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Health_Assessment_7'][0]?></span>
					                        </td>
					                    </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<p class="field_title">Briefly explain all <strong>"Yes"</strong> answers:</p>
					                        </td>
				                        </tr>
				                        <tr>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       		<?= (get_post_meta( $post_id,'',$single = false )['st_21_Health_Assessment_brief'][0]);?></span>
					                       </td>
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Do you Have any conditions that weaken the immune system:</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
			                    <table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<table width="100%" border="0" cellpadding="10">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>HIV/AIDs</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Do_you_Have_1'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Substance Abuse</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Do_you_Have_2'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Silicosis</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Do_you_Have_3'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Diabetes Mellitus</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Do_you_Have_4'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Kidney Disease</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Do_you_Have_5'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Low Body Weight</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Do_you_Have_6'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Recipient Of An Organ Transplant</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Do_you_Have_7'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Cancer</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Do_you_Have_8'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Medical Treatments Such As Corticosteroids</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Do_you_Have_9'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Specialized Treatments For Rheumatoid Arthritis Or Crohn's Disease</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Do_you_Have_10'][0] ?></span>
					                        </td>
					                    </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<p class="field_title">Briefly explain all <strong>"Yes"</strong> answers:</p>
					                        </td>
				                        </tr>
				                        <tr>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       		<?= (get_post_meta( $post_id,'',$single = false )['st_21_Do_you_Have_brief'][0]);?></span>
					                       </td>
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Tuberculosis Assessment:<br>Do you have any of the following symptoms of tuberculosis disease (TB):</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
			                    <table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<table width="100%" border="0" cellpadding="10">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>A Cough That Lasted 3 Weeks Or Longer</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_A_cough_that_1'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Chest Pain</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_A_cough_that_2'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Coughing Up Blood Or Sputum</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_A_cough_that_3'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Weakness Or Fatigue</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_A_cough_that_4'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Unintended Weight Loss</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_A_cough_that_5'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Decrease In Appetite</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_A_cough_that_6'][0]?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Fever Or Chills</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_A_cough_that_7'][0]?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Unexplained Night Sweats</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_A_cough_that_8'][0]?></span>
					                        </td>
					                    </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<p class="field_title">Briefly explain all <strong>"Yes"</strong> answers:</p>
					                        </td>
				                        </tr>
				                        <tr>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       		<?= (get_post_meta( $post_id,'',$single = false )['st_21_A_cough_that_brief'][0]);?></span>
					                       </td>
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Do you have any of the following risk of exposure to tuberculosis disease (TB):</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
			                    <table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="5"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<table width="100%" border="0" cellpadding="10">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Have You Had Close Contact Of A Person With Infectious TB Disease</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Have_you_had_1'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Does Your Country Of Origin Have A High Rate Of Tuberculosis Disease (TB)</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Have_you_had_2'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>No Have You Lived In Any Other Country Within The Last 10 Years</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Have_you_had_3'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Have You Worked/Volunteered/Lived With Anyone Who Is At High Risk For TB</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Have_you_had_4'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Have You Had Contact With Anyone Diagnosed With HIV/AIDS</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Have_you_had_5'][0] ?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="font-size: 16px;"><strong>Have You Ever Had A Positive TB Skin Test</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Have_you_had_6'][0] ?></span>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                        	<span style="font-size: 16px;"><strong>Have You Traveled Outside Of The U.S In The Past 12 Months</strong></span><br>
					                        	<span><?= get_post_meta($post_id)['st_21_Have_you_had_7'][0] ?></span>
					                        </td>
					                    </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<p class="field_title">Briefly explain all <strong>"Yes"</strong> answers:</p>
					                        </td>
				                        </tr>
				                        <tr>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       		<?= (get_post_meta( $post_id,'',$single = false )['st_21_Have_you_had_brief'][0]);?></span>
					                       </td>
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
				                        	<td>
				                        		<p>I have read and answered the above statements and declared that I have no injury, illness, or ailment other than specifically noted. Any falsification or misrepresentation will be sufficient grounds for termination.</p>
				                        		<p>I authorize the release of the contents of this health assessment to TLC Advanced Nursing LLC.</p>
				                        	</td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
<!-- 				                        <tr>
					                        <td>
					                          	<span><strong>Employee Signature:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Date:</strong></span>
					                        </td>
				                        </tr> -->
				                        <tr>
<!-- 					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;"></span>
					                       </td>  -->
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       		<?= (get_post_meta( $post_id,'',$single = false )['st_21_date'][0]);?></span>
					                       </td> 
				                        </tr>
				                    </tbody>
		                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Employee's Withholding Certificate</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<ul>
					                         		<li>Complete Form W-4 so that your employer can withhold the correct federal income tax from your pay.</li>
					                         		<li>Give Form W-4 to your employer.</li>
					                         		<li>Your withholding is subject to review by the IRS</li>
					                         	</ul>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Step 1: Enter Personal Information</strong></span>
					                        </td>
				                        </tr>
			                      	</tbody>
			                    </table>
			                    <table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>First Name:</strong></span>
					                         </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Middle Name:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Last Name:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_22_First_Name'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_22_Middle_Name'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_22_Last_Name'][0]);?></span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>Address:</strong></span>
					                         </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_22_Address_Name'][0]);?></span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>City:</strong></span>
					                         </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>State:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Zip Code:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_22_City_Name'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_22_State_Name'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_22_Zip_Name'][0]);?></span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px; text-transform: uppercase;"><strong>Social Security number</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<ul>
													<li>Does your name match the Personal name on your social security Card If not, to ensure credit for your earnings SSA at <a href="tel:800-772-1213">800-772-1213</a> or go to <a href="www.ssa.gov">www.ssa.gov</a></li>
												</ul>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                	<td>
		                		<table>
		                			<tbody>
		                				<tr>
		                					<td><span><div style="width: 5px;height: 5px;border: 3px solid #2196F3; border-radius: 50%;display: inline-block;"></div></span> Single or Married filing separately</td>
		                				</tr>
		                			</tbody>
		                		</table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                    	<tr>
						                	<td>
						                		<table width="100%" border="0"><!----SECTION SPACER---->
								                    <tbody>
								                        <tr>
								                          	<td height="10"></td>
								                        </tr>
								                      </tbody>
								                </table><!----SECTION SPACER---->
						                	</td>
						                </tr>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px; text-transform: uppercase;"><strong>Complete Steps 2-4 ONLY if they apply to you; otherwise, skip to Step 5</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<p>See page 2 for more information on each step, who can Claim exemption from withholding, when to use the online estimator, and privacy.</p>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px; text-transform: uppercase;"><strong>Step 2: Multiple Jobs or Spouse works</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<p>Complete this step if you (1) hold more than one job at a time, or (2) are married filing jointly and your spouse. The correct amount of withholding depends on income earned from all of these jobs.</p>
					                          	<p>Do only one of the following.</p>
					                          	<ol>
					                          		<li>Use the estimator at www.irs.gov/W4App for most accurate withholding for this step (and Steps 3-4); or</li>
					                          		<li>Use the Multiple Jobs Worksheet on page 3 and enter the result in Step 4(c) below for roughly accurate withholding; or</li>
					                          		<li>If there are only two jobs total, you may check this box. Do the same on Form W-4 for the other job. This option is accurate for jobs with similar pay; otherwise, more tax than necessary may be withheld.</li>
					                          	</ol>
					                          	<p><strong>TIP:</strong>To be accurate, submit a 2020 Form W-4 for all other jobs. If you (or your spouse) have self-employment Income, including as an independent contractor, use the estimator.</p>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px; text-transform: uppercase;"><strong>Complete Steps 3-4(b) on Form W-4 for only ONE of these jobs.</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<p>Leave those steps blank for the other jobs. (Your withholding will Be most accurate if you complete Steps 3-4(b) on the Form W-4 for the highest paying job.)</p>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px; text-transform: uppercase;"><strong>Step 3 Claim Dependents:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<p>If your income will be $200,000 or less ($400,000 or less if married filing jointly):</p>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                          	<span><strong>Multiply the number of qualifying children under age 17 by $2,000 $:</strong></span>
					                         </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Multiply the number of other dependents by $500 $:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span><strong>Add the amounts above and enter the total here $:</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          		<?= (get_post_meta( $post_id,'',$single = false )['st_22_State_Name'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_22_Multiply_the_number_of_other_dependents'][0]);?></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_22_Add_the_amounts'][0]);?></span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                    	<tr>
				                    		<td>
						                		<table width="100%" border="0"><!----SECTION SPACER---->
								                    <tbody>
								                        <tr>
								                          	<td height="10"></td>
								                        </tr>
								                      </tbody>
								                </table><!----SECTION SPACER---->
						                	</td>
				                    	</tr>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px; text-transform: uppercase;"><strong>Step 4 (optional) Other Adjustments:<strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<p><strong>(a) Other income (not from jobs).</strong> If you want tax withheld for other income you expect this year that won't have withholding, enter the amount of other income here. This may include interest, dividends, and retirement income. 4(a) | $</p>
					                        </td>
				                        </tr>
				                        <tr>
				                        	<td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_22_Other_Adjustments'][0]);?></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<p><strong>(b) Deductions. </strong> If you want tax withheld for other income you expect this year that won't have withholding, enter the amount of other income here. This may include interest, dividends, and retirement income. 4(a) | $</p>
					                        </td>
				                        </tr>
				                        <tr>
				                        	<td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_22_Deductions'][0]);?></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<p><strong>(c) Extra withholding.</strong> Enter any additional tax you want withheld each pay period. | 4(c)|$</p>
					                        </td>
				                        </tr>
				                        <tr>
				                        	<td>
					                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                          	<?= (get_post_meta( $post_id,'',$single = false )['st_22_Extra_withholding'][0]);?></span>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                    	<tr>
				                    		<td>
						                		<table width="100%" border="0"><!----SECTION SPACER---->
								                    <tbody>
								                        <tr>
								                          	<td height="10"></td>
								                        </tr>
								                      </tbody>
								                </table><!----SECTION SPACER---->
						                	</td>
				                    	</tr>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px; text-transform: uppercase;"><strong>Step 5: Sign Here</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<p>Under penalties of perjury, | declare that this certificate, to the best of my knowledge and belief, is true, correct, and complete.</p>
					                          	<p><strong>(b) Deductions. </strong> If you want tax withheld for other income you expect this year that wonâ€™t have withholding, enter the amount of other income here. This may include interest, dividends, and retirement income. 4(a) | $</p>
					                          	<p><strong>(c) Extra withholding.</strong> Enter any additional tax you want withheld each pay period. | 4(c)|$</p>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
<!-- 				                        <tr>
					                        <td>
					                          	<span><strong>Applicant Signature:</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td> -->
					                          	<span><strong>Date:</strong></span>
					                        </td>
					                    </tr>
				                        <tr>
<!-- 					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<img src="<?= $post_thumbnail ?>">
					                       		</span>
					                       </td> 
					                       <td width="20">&nbsp;</td>
					                       <td> -->
<!-- 					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       			<?= (get_post_meta( $post_id,'',$single = false )['st_2_conformation_date'][0]);?>
					                       		</span>
					                       </td>
				                        </tr>
				                        <tr>
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;"></span>
					                       </td> 
					                       <td width="20">&nbsp;</td> -->
					                       <td>
					                       		<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
					                       		<?= (get_post_meta( $post_id,'',$single = false )['st_22_Date'][0]);?></span>
					                       </td> 
				                        </tr>
				                        <tr>
				                        	<td><strong>This form is not valid unless you sign it.</strong></td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px; text-transform: uppercase;"><strong>Step 5: Sign Here</strong></span>
					                        </td>
					                        <td width="20">&nbsp;</td>
					                        <td>
					                        	<span style="font-size: 16px; text-transform: uppercase;"><strong>For Privacy Act and Paperwork Reduction Act Notice, see page 3.</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                       <td>
					                       		<p>Employer's name and address First date of Employment </p>
					                       		<p>Employer identification Number (EIN) </p>
					                       </td> 
					                       <td width="20">&nbsp;</td>
					                       <td>
					                       		<p>Cat. No. 10220Q Form W-4 (2020)</p>
					                       </td> 
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                    	<tr>
				                    		<td>
						                		<table width="100%" border="0"><!----SECTION SPACER---->
								                    <tbody>
								                        <tr>
								                          	<td height="10"></td>
								                        </tr>
								                      </tbody>
								                </table><!----SECTION SPACER---->
						                	</td>
				                    	</tr>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px; text-transform: uppercase;"><strong>Step 2(b) Multiple Jobs Worksheet (Keep for your records.)</strong></span></td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<p>If you choose the option in Step 2(b) on Form W-4, complete this worksheet (which calculates the total extra tax for all jobs) on only ONE Form W-4. Withholding will be most accurate if you complete the worksheet and enter the result on the Form W-4 for the highest paying job.</p>
					                          	<p><strong>Note:</strong> If more than one job has annual wages of more than $120,000 or there are more than three jobs, see Pub. 505 for additional tables; or, you can use the online withholding estimator at <a href="https://www.irs.gov/W4App.">www.irs.gov/W4App.</a></p>
					                          	<ol>
													<li>
														<p><strong>Two jobs.</strong> If you have two jobs or you're married filing jointly and you and your spouse each have one job, find the amount from the appropriate table on page 4. Using the "Higher Paying Job" row and the "Lower Paying Job" column, find the value at the intersection of the two household salaries and enter that value on line 1. Then, skip to line 3 </p><br>
														<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
															<?= (get_post_meta( $post_id,'',$single = false )['st_23_two_jobs'][0]);?></span>
													</li>
													<li>
														<p><strong>Two jobs.</strong> Three jobs. If you and/or your spouse have three jobs at the same time, complete lines 2a, 2b, and 2c below. Otherwise, skip to line 3. </p>
														<ul>
															<li>Find the amount from the appropriate table on page 4 using the annual wages from the highest paying job in the "Higher Paying Job" row and the annual wages for your next highest paying job in the "Lower Paying Job" column. Find the value at the intersection of the two household salaries and enter that value on line 2a $</li><br>
															<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
															<?= (get_post_meta( $post_id,'',$single = false )['st_23_find_the_amount'][0]);?></span>
															<li>
																<p>Add the annual wages of the two highest paying jobs from line 2a together and use the total as the wages in the "Higher Paying Job" row and use the annual wages for your third job in the "Lower Paying Job" column to find the amount from the appropriate table on page 4 and enter this amount on line 2b $</p><br>
																<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
																<?= (get_post_meta( $post_id,'',$single = false )['st_23_add_the_annual'][0]);?></span>
															</li>
															<li>
																<p>Add the amounts from lines 2a and 2b and enter the result on line 2c $</p><br>
																<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
																<?= (get_post_meta( $post_id,'',$single = false )['st_23_add_the_amounts'][0]);?></span>
															</li>
														</ul>
													</li>
													<li>
														<p>Enter the number of pay periods per year for the highest paying job. For example, if that job pays weekly, enter 52; if it pays every other week, enter 26; if it pays monthly, enter 12, etc </p><br>
	<!-- 													<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;"></span> -->
													</li>
													<li>
														<p><strong>Divide</strong> the annual amount on line 1 or line 2c by the number of pay periods on line 3. Enter this amount here and in <strong>Step 4(c)</strong> of Form W-4 for the highest paying job (along with any other additional amount you want withheld) </p><br>
	<!-- 													<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;"></span> -->
													</li>
												</ol>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                  	<td>
			                    <table width="100%" border="0">
				                    <tbody>
				                    	<tr>
				                    		<td>
						                		<table width="100%" border="0"><!----SECTION SPACER---->
								                    <tbody>
								                        <tr>
								                          	<td height="10"></td>
								                        </tr>
								                      </tbody>
								                </table><!----SECTION SPACER---->
						                	</td>
				                    	</tr>
				                        <tr>
					                        <td>
					                        	<span style="font-size: 16px; text-transform: uppercase;"><strong>Step 4(b) Deductions Worksheet (Keep for your records.)</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
					                        <td>
					                          	<p>If you choose the option in Step 2(b) on Form W-4, complete this worksheet (which calculates the total extra tax for all jobs) on only ONE Form W-4. Withholding will be most accurate if you complete the worksheet and enter the result on the Form W-4 for the highest paying job.</p>
					                          	<ol>
													<li>
														<p>Enter an estimate of your 2020 itemized deductions (from Schedule A (Form 1040 or 1040-SR)). Such deductions may include qualifying home mortgage interest, charitable contributions, state and local taxes (up to $10,000), and medical expenses in excess of 7.5% of your income</p><br>
														<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
														<?= (get_post_meta( $post_id,'',$single = false )['st_23_enter_estimate'][0]);?></span>
													</li>
													<li>
														<p>Enter</p>
														<ul>
															<li><p>$24,800 if you're married filing jointly or qualifying widow(er)</p></li>
															<li><p>$18,650 if you're head of household</p></li>
															<li><p>$12,400 if you're single or married filing separately</p></li>
														</ul><br>
														<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
														<?= (get_post_meta( $post_id,'',$single = false )['st_23_amount_itemized_deductions'][0]);?></span>
													</li>
													<li>
														<p>If line 1 is greater than line 2, subtract line 2 from line 1. If line 2 is greater than line 1, enter "-0-" .</p><br>
														<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
														<?= (get_post_meta( $post_id,'',$single = false )['st_23_lines_greater'][0]);?></span>
													</li>
													<li>
														<p>Enter an estimate of your student loan interest, deductible IRA contributions, and certain other adjustments (from Part II of Schedule 1 (Form 1040 or 1040-SR)). See Pub. 505 for more information </p><br>
														<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
														<?= (get_post_meta( $post_id,'',$single = false )['st_23_enter_estimate_student'][0]);?></span>
													</li>
													<li>
														<p>Add lines 3 and 4. Enter the result here and in Step 4(b) of Form W-4</p><br>
														<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
														<?= (get_post_meta( $post_id,'',$single = false )['st_23_enter_result'][0]);?></span>
													</li>
												</ol>
												<p><strong>Privacy Act and Paperwork Reduction Act Notice.</strong> We ask for the information on this form to carry out the Internal Revenue laws of the United States. Internal Revenue Code sections 3402(f)(2) and 6109 and their regulations require you to provide this information; your employer uses it to determine your federal income tax withholding. Failure to provide a properly completed form will result in your being treated as a single person with no other entries on the form; providing fraudulent information may subject you to penalties. Routine uses of this information include giving it to the Department of Justice for civil and criminal litigation; to cities, states, the District of Columbia, and U.S. commonwealths and possessions for use in administering their tax laws; and to the Department of Health and Human Services for use in the National Directory of New Hires. We may also disclose this information to other countries under a tax treaty, to federal and state agencies to enforce federal nontax criminal laws, or to federal law enforcement and intelligence agencies to combat terrorism. </p>
												<p>You are not required to provide the information requested on a form that is subject to the Paperwork Reduction Act unless the form displays a valid OMB control number. Books or records relating to a form or its instructions must be retained as long as their contents may become material in the administration of any Internal Revenue law. Generally, tax returns and return information are confidential, as required by Code section 6103. The average time and expenses required to complete and file this form will vary depending on individual circumstances. For estimated averages, see the instructions for your income tax return. If you have suggestions for making this form simpler, we would be happy to hear from you. See the instructions for your income tax return. </p>
					                        </td>
				                        </tr>
				                    </tbody>
		                    	</table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Notification and Authorization to Release Criminal Information for Employment Purposes</strong></span>
					                         	<p><strong><u>Notification</u></strong></p>
					                         	<p>The position for which I am being considered requires me to consent to a criminal background check as a condition of employment. This check includes the following: Criminal history reference searches for felony and misdemeanor convictions at the county and federal levels of every jurisdiction where I currently reside or where I have resided during the past 7 years; and sex offender registry searches at the county and federal levels in every jurisdiction where I currently reside or where I have resided.</p>
					                         	<p><strong><u>Authorization</u></strong></p>
					                         	<p>I hereby authorize TLC Advanced Nursing, LLC to conduct the criminal background check described above. In connection with this, I also authorize the use of law enforcement agencies and/or private background check organizations to assist TLC in collecting this information.</p>
					                         	<p>Validity Screening Solutions has been secured as a third party vendor (consumer reporting agency) to assist TLC in collecting and verifying information.</p>
					                         	<p>I also am aware that records of arrests on pending charges and/or convictions are not an absolute bar to employment. Such information will be used to determine whether the results of the background check reasonably bear on my trustworthiness or my ability to perform the duties of my position in a manner which is safe for TLC employees.</p>
					                        </td>
				                        </tr>
				                        <tr>
						                  	<td>
							                    <table width="100%" border="0">
								                    <tbody>
								                        <tr>
									                        <td>
									                          	<span><strong>Position(s) Applied for:</strong></span>
									                         </td>
								                        </tr>
								                        <tr>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['st_24_position_applied'][0]);?></span>
									                        </td>
								                        </tr>
								                        <tr>
									                        <td>
									                          	<span><strong>Please print (for identification purposes):</strong></span>
									                         </td>
								                        </tr>
								                    </tbody>
						                    	</table>
						                	</td>
						                </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
		                <tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table><!----SECTION SPACER---->
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Full Legal Name</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
						                  	<td>
							                    <table width="100%" border="0">
								                    <tbody>
								                        <tr>
									                        <td>
									                          	<span><strong>First Name:</strong></span>
									                         </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span><strong>Middle Name:</strong></span>
									                        </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span><strong>Last Name:</strong></span>
									                        </td>
								                        </tr>
								                        <tr>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['st_24_first_name'][0]);?></span>
									                        </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['st_24_middle_name'][0]);?></span>
									                        </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['st_24_last_name'][0]);?></span>
									                        </td>
								                        </tr>
								                    </tbody>
						                    	</table>
						                	</td>
						                </tr>
						                <tr>
						                  	<td>
							                    <table width="100%" border="0">
								                    <tbody>
								                        <tr>
									                        <td>
									                          	<span><strong>Other Names You Have Used in Past Seven Years:</strong></span>
									                         </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span><strong>Current Address:</strong></span>
									                        </td>
								                        </tr>
								                        <tr>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['st_24_other_names'][0]);?></span>
									                        </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['st_24_current_address'][0]);?></span>
									                        </td>
								                        </tr>
								                    </tbody>
						                    	</table>
						                	</td>
						                </tr>
						                <tr>
						                  	<td>
							                    <table width="100%" border="0">
								                    <tbody>
								                        <tr>
									                        <td>
									                          	<span><strong>Previous Address (most recent):</strong></span>
									                         </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span><strong>Addresses in the 7 years prior to completing this authorization:</strong></span>
									                        </td>
								                        </tr>
								                        <tr>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['st_24_previous_address'][0]);?></span>
									                        </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['st_24_addresses_years'][0]);?></span>
									                        </td>
								                        </tr>
								                    </tbody>
						                    	</table>
						                	</td>
						                </tr>
						                <tr>
						                	<td>
						                		<table width="100%" border="0" cellpadding="10">
								                    <tbody>
								                        <tr>
									                        <td>
									                        	<span style="font-size: 16px;"><strong>Gender:</strong></span><br>
									                        	<span>
									                        	<?php echo (get_post_meta($post_id)['st_24_gender'][0] == 'Male' ) ?  'Male' : ''?>
									                        	<?php echo (get_post_meta($post_id)['st_24_gender'][0] == 'Female' ) ?  'Female' : ''?>	
									                        	</span>
									                        </td>
									                    </tr>
								                    </tbody>
						                    	</table>
						                	</td>
						                </tr>
						                <tr>
						                  	<td>
							                    <table width="100%" border="0">
								                    <tbody>
								                        <tr>
									                        <td>
									                          	<span><strong>Social Security Number:</strong></span>
									                         </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span><strong>Driver's License:</strong></span>
									                        </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span><strong>State of Driver's License:</strong></span>
									                        </td>
								                        </tr>
								                        <tr>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['st_24_social_security_number'][0]);?></span>
									                        </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['st_24_driver_License'][0]);?></span>
									                        </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['st_24_State_Driver_License'][0]);?></span>
									                        </td>
								                        </tr>
								                    </tbody>
						                    	</table>
						                	</td>
						                </tr>
						                <tr>
						                  	<td>
							                    <table width="100%" border="0">
								                    <tbody>
								                        <tr>
									                        <td>
									                          	<p>Have you ever been convicted of a criminal *offense or have any pending criminal* charges against you?</p>
									                          	<p>* This refers only to felonies and misdemeanors; you do not need to include non-criminal traffic violations or municipal ordinance violations.</p>
									                         </td>
								                        </tr>
								                    </tbody>
						                    	</table>
						                	</td>
						                </tr>
						                <tr>
						                	<td>
						                		<table width="100%" border="0" cellpadding="10">
								                    <tbody>
								                        <tr>
									                        <td>
									                        	<span style="font-size: 16px;"><strong>Provide Detail On Next Page:</strong></span><br>
									                        	<span><?php echo (get_post_meta($post_id)['st_24_detail'][0] == 'yes' ) ?  'Yes' : ''?>
									                        	<?php echo (get_post_meta($post_id)['st_24_detail'][0] == 'no' ) ?  'No' : ''?></span>
									                        </td>
									                    </tr>
								                    </tbody>
						                    	</table>
						                	</td>
						                </tr>
						                <tr>
						                	<td>
						                		<table width="100%" border="0" cellpadding="10">
								                    <tbody>
								                        <tr>
									                        <td>
									                        	<p>To the best of my knowledge, the information provided in this Notice and Authorization and any attachments thereto is true and complete. I understand that any falsification or omission of information may disqualify me for this position and/or may serve as grounds for the severance of my employment with TLC. By signing below I hereby provide my authorization to TLC to conduct a criminal background check and I acknowledge that I have been provided with a summary of my rights under the Fair Credit Reporting Act which is attached. In addition to those rights, I understand that I have a right to appeal an adverse employment decision made by TLC based on my background check information within three business days of receipt of such notice and that a determination on my appeal will be made in seven working days from TLC's receipt of such appeal.</p>
									                        </td>
									                    </tr>
								                    </tbody>
						                    	</table>
						                	</td>
						                </tr>
						                <tr>
						                  	<td>
							                    <table width="100%" border="0">
								                    <tbody>
								                        <tr>
									                        <td>
									                          	<span><strong>INITIAL:</strong></span>
									                         </td>
								                        </tr>
								                        <tr>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['st_24_initial'][0]);?></span>
									                        </td>
								                        </tr>
								                    </tbody>
						                    	</table>
						                	</td>
						                </tr>
			                      	</tbody>
			                    </table>
		                	</td>
	                	</tr>
	                	<tr>
		                    <td>
		                    	<table width="100%" border="0"><!----SECTION SPACER---->
				                    <tbody>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                      </tbody>
				                </table>
			                    <table width="100%" border="0">
			                      	<tbody>
				                        <tr>
					                        <td>
					                         	<span style="font-size: 25px; text-transform:uppercase;"><strong>Authorization for Direct Deposit - Employee Form</strong></span>
					                        </td>
				                        </tr>
				                        <tr>
				                          	<td height="10"></td>
				                        </tr>
				                        <tr>
						                  	<td>
							                    <table width="100%" border="0">
								                    <tbody>
								                        <tr>
									                        <td>
									                          	<span><strong>This authorizes:</strong></span>
									                         </td>
								                        </tr>
								                        <tr>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['st_25_authorization_direct_deposit'][0]);?></span>
									                        </td>
								                        </tr>
								                    </tbody>
						                    	</table>
						                	</td>
						                </tr>
						                <tr>
						                  	<td>
							                    <table width="100%" border="0">
								                    <tbody>
								                        <tr>
									                        <td>
									                          	<p>the Company) to send credit entries (and appropriate debit and adjustment entries), electronically or by any other commercially accepted method, to my (our) eccount(s) Indicated below and to other accounts I (we) identify in the future (the Account). This authorizes the financial institution holding the Account to post all such entries.</p>
									                          	<p><strong>Note:</strong> Enter your company name in the blank space above.</p>
									                         </td>
								                        </tr>
								                    </tbody>
						                    	</table>
						                	</td>
						                </tr>
						                <tr>
						                	<td>
						                		<table width="100%" border="0" cellpadding="10">
								                    <tbody>
								                        <tr>
									                        <td>
									                        	<span style="font-size: 16px;"><strong>Account #1 Type (Check One):</strong></span><br>
									                        	<span><?= (get_post_meta($post_id)['st_25_acc1'][0] == 'Checking' ) ?  'Checking' : ''?>
									                        		<?= (get_post_meta($post_id)['st_25_acc1'][0] == 'Savings' ) ?  'Savings' : ''?></span>
									                        </td>
									                    </tr>
								                    </tbody>
						                    	</table>
						                	</td>
						                </tr>
						                <tr>
						                  	<td>
							                    <table width="100%" border="0">
								                    <tbody>
								                        <tr>
									                        <td>
									                          	<span><strong>Employee Bank Name:</strong></span>
									                         </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span><strong>Bank Routing:</strong></span>
									                        </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span><strong>(ABA) Account:</strong></span>
									                        </td>
								                        </tr>
								                        <tr>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['st_25_employee_bank_name'][0]);?></span>
									                        </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['st_25_bank_routing'][0]);?></span>
									                        </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['aba_account'][0]);?></span>
									                        </td>
								                        </tr>
								                    </tbody>
						                    	</table>
						                	</td>
						                </tr>
						                <tr>
						                  	<td>
							                    <table width="100%" border="0">
								                    <tbody>
								                        <tr>
									                        <td>
									                          	<span><strong>Percentage or Dollar Amount to be Deposited to This Account</strong></span>
									                         </td>
								                        </tr>
								                        <tr>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['st_25_percentage_dollar'][0]);?></span>
									                        </td>
								                        </tr>
								                    </tbody>
						                    	</table>
						                	</td>
						                </tr>
						                <tr>
						                	<td>
						                		<table width="100%" border="0" cellpadding="10">
								                    <tbody>
								                        <tr>
									                        <td>
									                        	<span style="font-size: 16px;"><strong>Account 2 (Remainder To Be Deposited To This Account)</strong></span><br>
									                        	<span><?php echo (get_post_meta($post_id)['st_25_acc2'][0] == 'Checking' ) ?  'Checking' : ''?>
																		<?php echo (get_post_meta($post_id)['st_25_acc2'][0] == 'Savings' ) ?  'Savings' : ''?>
									                        	</span>
									                        </td>
									                    </tr>
								                    </tbody>
						                    	</table>
						                	</td>
						                </tr>
						                <tr>
						                  	<td>
							                    <table width="100%" border="0">
								                    <tbody>
								                        <tr>
									                        <td>
									                          	<span><strong>Employee Bank Name:</strong></span>
									                         </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span><strong>Bank Routing:</strong></span>
									                        </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span><strong>(ABA) Account:</strong></span>
									                        </td>
								                        </tr>
								                        <tr>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['st_25_employee_bank_name'][0]);?></span>
									                        </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['st_25_bank_routing'][0]);?></span>
									                        </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['st_25_account'][0]);?></span>
									                        </td>
								                        </tr>
								                    </tbody>
						                    	</table>
						                	</td>
						                </tr>
						                <tr>
						                  	<td>
							                    <table width="100%" border="0">
								                    <tbody>
								                        <tr>
									                        <td>
									                          	<span><strong>Please attach a voided check for each account here.</strong></span>
									                         </td>
								                        </tr>
								                        <tr>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['st_25_printed_name'][0]);?></span>
									                        </td>
								                        </tr>
								                    </tbody>
						                    	</table>
						                	</td>
						                </tr>
						                <tr>
						                  	<td>
							                    <table width="100%" border="0">
								                    <tbody>
								                        <tr>
									                        <td>
									                          	<p>This authorization will be in effect until the Company receives a written termination notice from myself and has a reasonable opportunity to act on it.</p>
									                         </td>
								                        </tr>
								                    </tbody>
						                    	</table>
						                	</td>
						                </tr>
						                <tr>
						                  	<td>
							                    <table width="100%" border="0">
								                    <tbody>
								                        <tr>
									                        <td>
									                          	<span><strong>Signature:</strong></span>
									                         </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span><strong>Printed Name:</strong></span>
									                        </td>
								                        </tr>
								                        <tr>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<img src="<?= $post_thumbnail ?>"></span>
									                        </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['st_25_printed_name'][0]);?></span>
									                        </td>
								                        </tr>
								                    </tbody>
						                    	</table>
						                	</td>
						                </tr>
						                <tr>
						                  	<td>
							                    <table width="100%" border="0">
								                    <tbody>
								                        <tr>
									                        <td>
									                          	<span><strong>Employee ID:</strong></span>
									                         </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span><strong>Date:</strong></span>
									                        </td>
								                        </tr>
								                        <tr>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['st_25_employee'][0]);?></span>
									                        </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<span style="border:1px solid #ccc; height: auto; width: auto; padding: 15px; display: block;">
									                          	<?= (get_post_meta( $post_id,'',$single = false )['st_25_date'][0]);?></span>
									                        </td>
								                        </tr>
								                    </tbody>
						                    	</table>
						                	</td>
						                </tr>
						                <tr>
						                  	<td>
							                    <table width="100%" border="0">
								                    <tbody>
								                        <tr>
									                        <td>
									                          	<p><p><strong>IMPORTANT:</strong> This document must be signed by employees requesting automatic deposit of paychecks and retained on file by the employer. Do not send this form to Intuit. Employees must attach a voided check for each of their accounts to help verity their account numbers and bank routing numbers,</p></p>
									                         </td>
								                        </tr>
								                    </tbody>
						                    	</table>
						                	</td>
						                </tr>
						                <tr>
						                  	<td>
							                    <table width="100%" border="0">
								                    <tbody>
								                        <tr>
									                        <td>
									                          	<p>Employee: Please fill out and return to your employer.</p>
									                         </td>
									                        <td width="20">&nbsp;</td>
									                        <td>
									                          	<p>Employer: Please save for your files only.</p>
									                          	<p><strong>Ver. 041708 DD</strong></p>
									                        </td>
								                        </tr>
								                    </tbody>
						                    	</table>
						                	</td>
						                </tr>
			                      	</tbody>
			                    </table>
		                	</td>
		                </tr>
	              	</table>
	          	</td>
	          </tr>
	        </table>
	    </td>
    </tr>
    <tr>
      <td height="45">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>


<?php

get_footer();

?>