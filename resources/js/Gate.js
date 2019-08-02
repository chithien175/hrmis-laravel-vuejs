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

    // Manager
    isManageDashboard(){
        return this.user.can['manage-dashboard'];
    }

    isManageBlog(){
        return this.user.can['manage-blog'];
    }

    isManagePage(){
        return this.user.can['manage-page'];
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

    isManageMenu(){
        return this.user.can['manage-menu'];
    }

    isManageEcommerce(){
        return this.user.can['manage-ecommerce'];
    }

    // Module
    isBlogModule(){
        return this.modules.blog === 1;
    }
    isMenuModule(){
        return this.modules.menu === 1;
    }
    isEcommerceModule(){
        return this.modules.ecommerce === 1;
    }
}
