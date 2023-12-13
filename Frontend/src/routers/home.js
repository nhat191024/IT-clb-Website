const home = [
    {
        path: "/",
        component: () => import("../layouts/home.vue"),
        children: [
            {
                path: "/",
                name: "home-page",
                component: () => import("../pages/home/index.vue"),
            }
        ]
    }
]


export default home;