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

    isUser(){
        return this.user.roles[0].name === 'user';
    }

    isManageUsers(){
        return this.user.can['manage-users'];
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
}
