import logo from './logo.svg';
import './App.css';
import Navbar from './components/Navbar/Navbar';
import Offers from './components/Offers/Offers';
import { Link, Route, Router, Routes } from 'react-router-dom';
import PromotionalCodes from './components/promotional_codes/PromotionalCodes';

function App() {
  return (
    <div className="App">
      <Navbar/>
      <Routes>
        <Route path='/' element={<Offers/>} />
        <Route path='my-codes' element={<PromotionalCodes/>} />
      </Routes>

      Hola
    </div>
  );
}

export default App;
