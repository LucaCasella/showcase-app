import './bootstrap';

import './react/main.tsx'

import Alpine from 'alpinejs';

import '../css/app.scss';
import '../sass/main-backoffice.scss'
import '../sass/main-public.scss';

window.Alpine = Alpine;

Alpine.start();
