import "./App.css";
import "swiper/css";
import "@fontsource/poppins";
import "swiper/css/pagination";
import MainRoute from "./routes/MainRoute";
import { BrowserRouter } from "react-router-dom";
import Toaster from "./components/templates/Toaster";


function App() {

  return (
    <>
      <BrowserRouter>
        <Toaster />
        <div className="bg-white">

        <MainRoute />
        </div>
      </BrowserRouter>
    </>
  );
}

export default App;
