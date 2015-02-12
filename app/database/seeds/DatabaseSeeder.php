<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('UserTableSeeder');
        //$this->call('UsersRolesPermisionTableSeeder');

	}

}



class UserTableSeeder extends Seeder{

    public function run()
    {

        $user = new User;
        $user->username = 'framos';
        $user->email = 'fernandoramoscarrasco@gmail.com';
        $user->password = '123456';
        $user->password_confirmation = '123456';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->confirmed = 1;

        if(! $user->save()) {
            Log::info('Unable to create user '.$user->username, (array)$user->errors());
        } else {
            Log::info('Created user "'.$user->username.'" <'.$user->email.'>');
        }

    }
}

class UsersRolesPermisionTableSeeder extends Seeder{

    public function run()
    {
        $admin = new Role;
        $admin->name = "Administrator";
        $admin->save();

        $user = User::where('username', '=', 'framos')->first();
        $user->roles()->attach( $admin->id );

        $editorAdvance = new Role;
        $editorAdvance->name = "Editor Advance";
        $editorAdvance->save();

        $editor = new Role;
        $editor->name = "Editor";
        $editor->save();

        $manageUsers = new Permission;
        $manageUsers->name = 'manage_users';
        $manageUsers->display_name = 'Manage Users';
        $manageUsers->save();

        $editImage = new Permission;
        $editImage->name = 'edit_image';
        $editImage->display_name = 'Edit Images';
        $editImage->save();

        $deletePackage = new Permission;
        $deletePackage->name = 'delete_package';
        $deletePackage->display_name = 'Delete Package';
        $deletePackage->save();

        $deleteHotel = new Permission;
        $deleteHotel->name = 'delete_hotel';
        $deleteHotel->display_name = 'Delete Hotel';
        $deleteHotel->save();

        $deleteAdditional = new Permission;
        $deleteAdditional->name = 'delete_additional';
        $deleteAdditional->display_name = 'Delete Additional';
        $deleteAdditional->save();

        $deleteTestimonio = new Permission;
        $deleteTestimonio->name = 'delete_testimonio';
        $deleteTestimonio->display_name = 'Delete Testimonio';
        $deleteTestimonio->save();

        $deleteDestination = new Permission;
        $deleteDestination->name = 'delete_destination';
        $deleteDestination->display_name = 'Delete Destination';
        $deleteDestination->save();

        $deleteDestinationForHotel = new Permission;
        $deleteDestinationForHotel->name = 'delete_destination_for_hotel';
        $deleteDestinationForHotel->display_name = 'Delete Destination For Hotel';
        $deleteDestinationForHotel->save();


        $admin->perms()->sync(array($manageUsers->id, $editImage->id, $deletePackage->id, $deleteHotel->id, $deleteAdditional->id, $deleteTestimonio->id, $deleteDestination->id, $deleteDestinationForHotel->id));

        $editorAdvance->perms()->sync(array($editImage->id, $deletePackage->id, $deleteHotel->id, $deleteAdditional->id, $deleteTestimonio->id, $deleteDestination->id, $deleteDestinationForHotel->id));

        $editor->perms()->sync(array($deletePackage->id, $deleteHotel->id, $deleteAdditional->id, $deleteTestimonio->id, $deleteDestination->id, $deleteDestinationForHotel->id));
    }
}
