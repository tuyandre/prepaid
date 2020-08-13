/**
 * Created by PC on 04-Aug-20.
 */
import Password from './components/backend/profiles/changePassword.vue'
import Home from './components/backend/profiles/home.vue'
import Profile from './components/backend/profiles/profile.vue'
import EditProfile from './components/backend/profiles/info.vue'
import FullProfile from './components/backend/profiles/fullProfile.vue'

import addRole from './components/backend/roles/addRole.vue'
import allRole from './components/backend/roles/allRole.vue'
import editRole from './components/backend/roles/editRole.vue'

import addUser from './components/backend/users/addUser.vue'
import AllUser from './components/backend/users/allUser.vue'
import editUser from './components/backend/users/editUser.vue'


export const routes = [
    {
        baseUrl:'/home',
        path: '/home',
        component: Home,
        name:'Home'
    },
    {
        baseUrl:'/home',
        path: '/changePassword',
        component: Password,
        name:'Password'
    },
    {
        baseUrl:'/home',
        path: '/profile',
        component: Profile,
        name:'Profile'
    },
    {
        baseUrl:'/home',
        path: '/editProfile',
        component: EditProfile,
        name:'EditProfile'
    },
    
    {
        baseUrl:'/home',
        path: '/fullProfile',
        component: FullProfile,
        name:'FullProfile'
    },
    {
        baseUrl:'/home',
        path: '/addRole',
        component: addRole,
        name:'addRole'
    },
    {
        baseUrl:'/home',
        path: '/allRole',
        component: allRole,
        name:'allRole'
    },
    {
        baseUrl:'/home',
        path: '/editRole/:id',
        component: editRole,
        name:'editRole',
        props:true
    },
    {
        baseUrl:'/home',
        path: '/allUser',
        component: AllUser,
        name:'allUser'
    },
    {
        baseUrl:'/home',
        path: '/addUser',
        component: addUser,
        name:'addUser'
    },
    {
        baseUrl:'/home',
        path: '/editUser',
        component: editUser,
        name:'editUser'
    },




]
