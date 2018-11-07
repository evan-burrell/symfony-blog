/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');

import React from 'react';
import ReactDOM from 'react-dom';
import PostList from './components/PostList';
import Navbar from './components/Navbar';
import 'babel-polyfill';

const userData = document.getElementById('auth-navbar');
if (userData) {
  ReactDOM.render(<Navbar {...userData.dataset} />, userData);
} else {
  ReactDOM.render(<Navbar />, document.getElementById('no-auth-navbar'));
}

ReactDOM.render(<PostList />, document.getElementById('post-list'));
