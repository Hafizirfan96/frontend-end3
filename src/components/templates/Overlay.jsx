import { motion } from "framer-motion";
const overlay = {
  visible: { visibility: "visible", opacity: 1 },
  hidden: { visibility: "hidden", opacity: 0, transition: { delay: 0.2 } }
};
const Overlay = ({ toggleNav, toggleFn,className="" }) => {
  return (
    <motion.div
      variants={overlay}
      initial="hidden"
      animate={toggleNav ? "visible" : "hidden"}
      exit="hidden"
      transition={{ duration: 0.3 }}
      onClick={toggleFn}
      className={`bg-gray-700/80 z-30 fixed -top-10 left-0  bottom-0 right-0 ${className}`}
    ></motion.div>
  );
};

export default Overlay;
