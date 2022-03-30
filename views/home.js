"use strict";

import {h, render} from 'https://cdn.skypack.dev/preact';
import {useState} from 'https://unpkg.com/preact/hooks/dist/hooks.module.js?module'

const Home = () => {
  return h("h1", null, "Home");
};

const main = () => {
  return Router(null, [
    Home({path: "/"})
  ]);
};

render(main(), document.getElementById("main"));
