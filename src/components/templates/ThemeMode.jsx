import { FaMoon, FaSun } from "react-icons/fa6";
import { useEffect, useState } from "react";
import { useSelector } from "react-redux";

const ThemeMode = () => {
  const { toggleNav } = useSelector((state) => state.templates);

  const [isDark, setIsDark] = useState(() => {
    const theme = localStorage.getItem("theme");
    return theme === "dark";
  });

  useEffect(() => {
    if (isDark) {
      document.documentElement.classList.add("dark");
      localStorage.setItem("theme", "dark");
    } else {
      document.documentElement.classList.remove("dark");
      localStorage.setItem("theme", "light");
    }
  }, [isDark]);

  return (
    <div className={`flex justify-center mb-10 `}>
      <div
        className={`group w-fit ${
          toggleNav ? " flex-row px-4 py-2" : " flex-col p-2"
        } h-15 b-bg   relative rounded-full select-none cursor-pointer flex`}
        onClick={() => setIsDark((prev) => !prev)}
      >
        <div
          className={` h-full rounded-full transition-all absolute ${
            !isDark
              ? "left-30 bg-blue-500 shadow-xl"
              : "left-0 bg-blue-500 shadow-blue-50"
          }`}
        ></div>
        <span
          className={`transition relative space-x-3 text-2xl rounded-full  flex items-center justify-center font-bold 
            ${!isDark ? "f-bg  shadow " : ""}
            ${toggleNav ? "px-5 py-1" : "p-3"}
            `}
        >
          <FaSun />
          {toggleNav ? <span>Light</span> : null}
        </span>
        <span
          className={`transition relative space-x-3  text-2xl w-30  rounded-full  flex items-center justify-center font-bold 
            ${!isDark ? " " : "f-bg  shadow "}
            ${toggleNav ? "px-5 py-1" : "p-3"}
            `}
        >
          <FaMoon />
          {toggleNav ? <span>Dark</span> : null}
        </span>
      </div>
    </div>
  );
};

export default ThemeMode;
