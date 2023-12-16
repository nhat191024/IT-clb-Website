const admin = [
    {
        path: "/admin",
        component: () => import("../layouts/admin.vue"),
        children: [
            {
                path: "/admin",
                name: "dashboard",
                component: () => import("../pages/admin/dashboard.vue"),
            },
            {
                path: "projects",
                name: "projects",
                component: () => import("../pages/admin/Project.vue"),
            },
            {
                path: "tasks",
                name: "tasks",
                component: () => import("../pages/admin/Task.vue"),
            },
            {
                path: "members",
                name: "members",
                component: () => import("../pages/admin/Member.vue"),
            },
            {
                path: "blogs",
                name: "blogs",
                component: () => import("../pages/admin/Blog.vue"),
            },
            {
                path: "meets",
                name: "meets",
                component: () => import("../pages/admin/Meet.vue"),
            },
        ]
    }
]


export default admin;