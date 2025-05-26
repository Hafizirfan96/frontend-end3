import { useEffect, useState } from "react";
import Select from "react-select";
import Header from "./DashboardPages/Components/Header";
import Footer from "./DashboardPages/Components/Footer";
import CustomModal from "@/components/templates/modals/CustomModal";
import snaptik from "@/assets/snaptik.mp4";
import { useNavigate } from "react-router-dom";


const VideoPlayer = () => {

    const [isModalOpen, setModalOpen] = useState(false);

    const navigate= useNavigate()

    const gobacks =()=>{
      navigate("/")
    }

      useEffect(() => {
       setModalOpen(true);
      }, []);

  return (
    <div>
      <Header />
      {/* <div className="Browse bg-[#478e51] mb-8">
        <div className="h-5" />
        <div className="flex items-center">
          <div className=" ml-16">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 640 512"
              fill="#e2e028ed"
              width="32" 
              height="32"
            >
              <path d="M320 32L0 160l320 128 320-128L320 32zm0 288c-35.3 0-64 28.7-64 64v96h128v-96c0-35.3-28.7-64-64-64z" />
            </svg>
          </div>
          <h2 className="text-light text-[20px] text-bold ml-3 text-white ">
            For VideoPlayer
          </h2>
        </div>
        <div className="h-8" />
      </div> */}

      <CustomModal isOpen={isModalOpen} onClose={() =>{
         setModalOpen(false)
        gobacks()
      }
      }>
        <video controls autoPlay className="w-full h-auto rounded-lg">
          <source src={snaptik} type="video/mp4" />
          Your browser does not support the video tag.
        </video>
      </CustomModal>
      {/* <Footer /> */}
    </div>
  );
};

export default VideoPlayer;
