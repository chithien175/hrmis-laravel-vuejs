export default class Gate{

    constructor(user){
        this.user = user;
        this.modules = modules;
    }

    isSuperAdmin(){
        return this.user.roles[0].name === 'superadmin';
    }

    isAdmin(){
        return this.user.roles[0].name === 'admin';
    }

    isManageDashboard(){
        return this.user.can['manage-dashboard'];
    }

    isManageBlog(){
        return this.user.can['manage-blog'];
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

    isBlogModule(){
        return this.modules.blog === 1;
    }
}
