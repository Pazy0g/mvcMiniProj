<?php
		
		/**
		*  Vue USERS
		*/
		
		$JS_data = null;
		
		// on scanne le tableau stocké sur $user :
		foreach ($user as  $data) {
			
			//données pour JQuery :
			
			$JS_data .= "'".$data['id']."_u_prenom':$('#".$data['id']."_u_pnom').val(),";
			$JS_data .= "'".$data['id']."_u_nom':$('#".$data['id']."_u_nom').val(),";
			$JS_data .= "'".$data['id']."_u_email':$('#".$data['id']."_u_mail').val(),";
			$JS_data .= "'".$data['id']."_u_born':$('#".$data['id']."_u_born').val(),";
			$JS_data .= "'".$data['id']."_u_ville':$('#".$data['id']."_u_ville').val(),";
			$JS_data .= "'".$data['id']."_u_enfants':$('#".$data['id']."_u_child').val(),";
			$JS_data .= "'".$data['id']."_u_tel':$('#".$data['id']."_u_tel').val(),";
			
			
			// on affiche les résultats trouvés sous un formulaire
			// il est important de conserver l'id de chaque tuple issu de la bdd :
			
			echo "
				<tr>
				  <th scope='row'>".$data['id']."</th>
				  <td> <input type='text' class='form-control' value='".$data['prenom']."' id='".$data['id']."_u_pnom' size='5' /> </td>
				  <td> <input type='text' class='form-control' value='".$data['nom']."' id='".$data['id']."_u_nom' size='5' /> </td>
				  <td> <input type='text' class='form-control' value='".$data['email']."' id='".$data['id']."_u_mail' size='5' /> </td>
				  <td> <input type='text' class='form-control' value='".$data['ne_le']."' id='".$data['id']."_u_born' size='5' /> </td>
				  <td> <input type='text' class='form-control' value='".$data['ville']."' id='".$data['id']."_u_ville' size='5' /> </td>
				  <td> <input type='text' class='form-control' value='".$data['enfants']."' id='".$data['id']."_u_child' size='5' /> </td>
				  <td> <input type='text' class='form-control' value='".$data['tel']."' id='".$data['id']."_u_tel' size='5' /> </td>
				</tr>
			";
			
		}
		
?>
