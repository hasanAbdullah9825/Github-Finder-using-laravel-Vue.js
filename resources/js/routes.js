import WelcomeComponent from "./components/WelcomeComponent.vue";
import ProfileComponent from "./components/ProfileComponent.vue";


export const routes = [
    {
        path: "/",
        component: WelcomeComponent
    },
    {
        path: "/profile/:username",
        // dynamic segments start with a colon
        component: ProfileComponent
    }
];
