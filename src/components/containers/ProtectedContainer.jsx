// import {useSelector} from "react-redux"
import { useSelector } from "react-redux";
import Header from "../templates/Header/Header";
import SideNav from "../templates/sideNav/SideNav";

const ProtectedContainer = ({ className, children }) => {
  const { toggleNav } = useSelector((state) => state.templates);
  return (
    <main className={`relative w-full min-h-screen  ${className}`}>
      <SideNav />
      <div
        className={`${
          !toggleNav ? "ml-28" : " ml-28 lg:ml-[27rem]"
        }  duration-300  min-h-screen`}
      >
        <Header />
        <div className="m-10 ">
          <div className=" md:min-w-[700px] mb-10 ">{children}</div>
        </div>
      </div>
    </main>
  );
};

export default ProtectedContainer;
