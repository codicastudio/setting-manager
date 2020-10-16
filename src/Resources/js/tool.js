Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'setting-manager',
      path: '/setting-manager',
      component: require('./views/Settings').default,
    },
  ]);
});
