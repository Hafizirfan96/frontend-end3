import ReactLoading from "react-loading";
import {motion} from "framer-motion"
const PageLoading = () => {
  return (
    <>
      <motion.div exit={{opacity:0}} className="w-full fixed top-0 bottom-0 left-0 right-0 bg-black/90 z-50">
        <div className="w-full min-h-screen flex justify-center items-center flex-col gap-5">
            <ReactLoading
              type="spinningBubbles"
              color="white"
              height={"5%"}
              width={"5%"}
            />
            <h2 className="text-xl text-white">Loading...</h2>
        </div>
      </motion.div>
    </>
  );
};

export default PageLoading;
