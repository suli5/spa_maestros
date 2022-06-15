const Home = ()=> import('./components/Home.vue');
const Contacto = ()=> import('./components/Contacto.vue');


//IMPORTAMOS LOS COMPONENTES PARA maestro

const Mostrar = ()=> import('./components/maestro/Mostrar.vue');
const Crear = ()=> import('./components/maestro/Crear.vue');
const Editar = ()=> import('./components/maestro/Editar.vue');


export const routes = [
    {
        name:'home',
        path:'/',
        component:Home
    },
    {
        name:'contacto',
        path:'/contacto',
        component:Contacto
    },
    {
        name:'mostrarMaestros',
        path:'/maestros',
        component:Mostrar
    },
    {
        name:'crearMaestro',
        path:'/crear',
        component:Crear
    },
    {
        name:'editarMaestro',
        path:'/editar/:id',//CON id PORQUE PARA EDITAR TENEMOS QUE PASAR UN id
        component:Editar
    },
];