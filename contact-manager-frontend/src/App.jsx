import React from 'react';
import { BrowserRouter, Routes,Route } from "react-router-dom";
import DisplayContacts from './pages/display-contacts';
import Map from './pages/map';
import Add from './pages/contact-form';
import 'leaflet/dist/leaflet.css';
import 'react-leaflet-markercluster/dist/styles.min.css';


function App() {

  return (
      <BrowserRouter>
      <Routes>
        <Route path='/' element={<Add/>}></Route>
        <Route path='display' element={<DisplayContacts/>}></Route>
        <Route path='map' element={<Map/>}></Route>
      </Routes>
      </BrowserRouter>
  );
}

export default App;
