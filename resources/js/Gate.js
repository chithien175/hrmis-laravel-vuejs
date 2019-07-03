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

    // isSuperAdminOrAdmin(){
    //     if(this.user.roles[0].name === 'superadmin' || this.user.roles[0].name === 'admin'){
    //         return true;
    //     }
    // }

    // isAdminOrUser(){
    //     if(this.user.roles[0].name === 'admin' || this.user.roles[0].name === 'user'){
    //         return true;
    //     }
    // }
}
