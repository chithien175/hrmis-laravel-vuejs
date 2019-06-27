export default class Gate{

    constructor(user){
        this.user = user;
    }

    isSuperAdmin(){
        return this.user.type === 'superadmin';
    }

    isAdmin(){
        return this.user.type === 'admin';
    }

    isUser(){
        return this.user.type === 'user';
    }

    isSuperAdminOrAdmin(){
        if(this.user.type === 'superadmin' || this.user.type === 'admin'){
            return true;
        }
    }

    isAdminOrUser(){
        if(this.user.type === 'admin' || this.user.type === 'user'){
            return true;
        }
    }
}
