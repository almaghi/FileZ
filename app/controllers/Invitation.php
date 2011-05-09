<?php
/**
 * Copyright 2010  Université d'Avignon et des Pays de Vaucluse 
 * email: gpl@univ-avignon.fr
 *
 * This file is part of Filez.
 *
 * Filez is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Filez is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Filez.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Controller used for invitations: users invite, guests go.
 */
class App_Controller_Invitation extends Fz_Controller {

   /**
     * Create an invitation for someone else to upload one file. 
     * (show invitation form only)
     */   
    public function inviteFormAction () {
        $this->secure ();
        
        $fz_user = $this->getUser ();
        //$file = $this->getFile ();
        //$this->checkOwner ($file, $fz_user);
        set ('user', $fz_user);
        set ('check', 'hello');
        
        print_r('TODO: invitation form');

        return html ('invitation/create.php');
    }

    /**
     * Create an invitation for someone else to upload one file. 
     * (This is a POST action)
     */
    public function inviteAction () {
        $this->secure ();
        
        print_r('TODO: invitation posted');
        echo ' to : '.$_POST['name'].' at '.$_POST['to'];
   }
    
    /**
     * Come to an invitation
     */
     public function goAction () {

            print_r('TODO: Welcome guest.');
            return html ('invitation/upload.php');
    }
}
