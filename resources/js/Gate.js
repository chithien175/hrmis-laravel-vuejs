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

    isManagePost(){
        return this.user.can['manage-post'];
    }

    isManageCompany(){
        return this.user.can['manage-company'];
    }

    isManageLogs(){
        return this.user.can['manage-logs'];
    }

    isManageMedia(){
        return this.user.can['manage-media'];
    }
}
