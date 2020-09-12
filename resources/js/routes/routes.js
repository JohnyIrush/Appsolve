import home from '../components/App/home.vue';
import solutions from '../components/App/solutions.vue';
import Apps from '../components/App/Apps.vue';
import blog from '../components/App/blog.vue';
import Services from '../components/App/Services.vue';
import About from '../components/App/About.vue';
//App purchase
import Select from '../components/App/Purchase/Select.vue';
import Details from '../components/App/Purchase/Details.vue';
import Payment from '../components/App/Purchase/Payment.vue';
import installation from '../components/App/Purchase/installation.vue';
import Contact from '../components/App/Contact.vue';
//Authentication
import login from '../components/Auth/login.vue';
import register from '../components/Auth/register.vue';

//editor 
import editor from '../components/Editor/Editor.vue';

export default[
    {
        path: '/',
        component: home,  
        name: 'home'
      },
      {
        path: '/solutions',
        component: solutions,  
        name: 'solutions'
      },
      {
        path: '/apps',
        component: Apps,  
        name: 'apps'
      } ,
      {
        path: '/blog',
        component: blog,  
        name: 'blog'
      },
      {
        path: '/services',
        component: Services,  
        name: 'Services'
      },
      {
        path: '/about',
        component: About,  
        name: 'About'
      },
      {
        path: '/Select',
        component: Select,  
        name: 'Select'
      }
      ,
      {
        path: '/Details',
        component: Details,  
        name: 'Details'
      },
      {
        path: '/Payment',
        component: Payment,  
        name: 'Payment'
      } 
      ,
      {
        path: '/installation',
        component: installation,  
        name: 'installation'
      }  
      ,
      {
        path: '/Contact',
        component: Contact,  
        name: 'Contact'
      },
      ,
      {
        path: '/login',
        component: login,  
        name: 'login'
      }
      ,
      {
        path: '/register',
        component: register,  
        name: 'register'
      } 
      ,
      {
        path: '/editor',
        component: editor,  
        name: 'editor'
      }             
];