const admin = [
    {
        path: "/admin",
        component: () => import("../layouts/admin.vue"),
        children: [
            {
                path: "dashboard",
                name: "admin-dashboard-main",
                component: () => import("../pages/admin/adminDashboardMain.vue"),
            }
        ]
    }
]


export default admin;