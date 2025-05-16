import { useLocation } from "react-router-dom";
import Footer from "../templates/Footer/Footer";
import Header from "../templates/Header/Header";
import MainHeader from "../templates/Header/MainHeader";

const ProtectedContainer = ({ className, children, firstHeader }) => {

  const currentRoute = useLocation()

  return (
    <div>
      {/* {currentRoute.pathname !== "/mainMenu" && currentRoute.pathname !== "/singleRestaurant" && currentRoute.pathname !== "/profileScreen" && currentRoute.pathname !== "/checkOut" ? <Header /> : <MainHeader />} */}

      <main className="container max-w-container">
        <div className=" md:min-w-[700px] mb-5 ">{children}</div>
      </main>
      <Footer />
    </div>
  );
};

export default ProtectedContainer;
