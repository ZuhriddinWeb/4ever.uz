export default [
	{
		path: '/',
		name:'home',
		component: () => import('../pages/Home.vue'),
	},
	// {
	// 	path: '/public/images/FOREVER.pdf',
	// 	// name:'home',
	// 	// component: () => import('../pages/Home.vue'),
	// },
	{
		path: '/register/:id',
		name:'register',
		component: () => import('../pages/Register.vue'),
		props: true,
		
	},
	{
		path: '/login',
		name:'login',
		component: () => import('../pages/Login.vue'),
		props: true,
		
	},
	{
		path: '/eshop',
		name:'eshop',
		component: () => import('../pages/Eshop.vue'),
	},
	{
		path: '/cart',
		name:'cart',
		component: () => import('../pages/Cart.vue'),
		meta: {
			guard: 'auth',
		},
	},
	{
		path: '/checkout',
		name:'checkout',
		component: () => import('../pages/Checkout.vue'),
		meta: {
			guard: 'auth',
		},
	},
	{
		path: '/payStepOne/:id',
		component: () => import('../pages/PayStepOne.vue'),
		name: 'payStepOne',
		props: true,		
	},
	{
		path: '/profile',
		name:'profile',
		component: () => import('../pages/Profile.vue'),
		redirect: { name: 'myinfo' },
		children: [
			{
				path: 'myinfo',
				name:'myinfo',
				component: () => import('../pages/profilepages/MyInfo.vue'),		
			},
			{
				path: 'mywallet',
				name:'mywallet',
				component: () => import('../pages/profilepages/MyWallet.vue'),		
			},
			{
				path: 'myorders',
				name:'myorders',
				component: () => import('../pages/profilepages/MyOrders.vue'),		
			},
			{
				path: 'mypeoples',
				name:'mypeoples',
				component: () => import('../pages/profilepages/MyPeoples.vue'),		
			},
			{
				path: 'myhistory',
				name:'myhistory',
				component: () => import('../pages/profilepages/MyHistory.vue'),		
			},
		],
		meta: {
			guard: 'auth',
		},
	},
	{
		path: '/categories/:id',
		component: () => import('../components/Categories.vue'),
		name: 'categories',
		props: true,
		
	},
	{
		path: '/product-view/:id',
		component: () => import('../pages/Product.vue'),
		name: 'product-view',
		props: true,
		
	},
	{
		path: '/admin',
		redirect:'/admin/monitoring',
		name:'admin',
		meta: {
			guard: 'admin',
		},
		component: () => import('../adminpages/Admin.vue'),	
		children: [
			{
				path: 'category',
				name:'category',
				component: () => import('../adminpages/Categories.vue'),		
			},
			{
				path: 'tree',
				name:'tree',
				component: () => import('../adminpages/Tree.vue'),		
			},
			{
				path: 'products',
				name:'products',
				component: () => import('../adminpages/Products.vue'),		
			},
			{
				path: 'monitoring',
				name:'monitoring',
				component: () => import('../adminpages/Monitoring.vue'),		
			},
			{
				path: 'status',
				name:'status',
				component: () => import('../adminpages/Status.vue'),		
			},
			{
				path: 'orders',
				name:'orders',
				component: () => import('../adminpages/Orders.vue'),		
			},
			{
				path: 'completedOrders',
				name:'completedOrders',
				component: () => import('../adminpages/CompletedOrders.vue'),		
			},
			{
				path: 'users',
				name:'users',
				component: () => import('../adminpages/Users.vue'),		
			},
		],	
		
	},

	{
		path: '/:pathMatch(.*)*',
		redirect: '/',
		name: 'pathMatch',
		meta: {
			title: 'all',
		}
	}
];