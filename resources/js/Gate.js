export default class Gate{

    constructor(user){
        this.user = user;
    }

    isSuperAdmin(){
        return this.user.roles[0].name === 'superadmin';
    }

    isAdmin(){
        return this.user.roles[0].name === 'admin';
    }

    isManageACL(){
        return this.user.can['manage-acl'];
    }

    isManageCompany(){
        return this.user.can['manage-company'];
    }

    isManageDeveloper(){
        return this.user.can['manage-developer'];
    }

    isManageLogs(){
        return this.user.can['manage-logs'];
    }

    isManageMedia(){
        return this.user.can['manage-media'];
    }
}
