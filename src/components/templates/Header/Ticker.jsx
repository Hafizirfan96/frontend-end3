import { useEffect, /* useMemo, */ useState } from "react";
import style from "./Header.module.css";
// import { useTickerCreateGroup } from "../../../services/queries/ticker/mutation";
import { bgAlt, /* text1 */ } from "../../../utils/themeColors";

const Ticker = () => {
  // const tickerGroup = useTickerCreateGroup();

  const [showBackground, setShowBackground] = useState(false);
  useEffect(() => {
    const handleScroll = () => setShowBackground(window.scrollY >= 60);
    window.addEventListener("scroll", handleScroll);

    return () => {
      window.removeEventListener("scroll", handleScroll);
    };
  }, []);

  // eslint-disable-next-line react-hooks/exhaustive-deps
  // useEffect(() => {
  //   tickerGroup.mutate({ group: "Web Application" });
  // }, []);

  // const tickers = useMemo(
  //   () => tickerGroup?.data?.data?.ticker,
  //   [tickerGroup?.data]
  // );

  return (
    <div
      className={`${
        showBackground ? "fixed top-0 left-0 z-[49] w-full " : "mx-3  w-[76%]"
      } text-base font-bold text-gray-600   flex   shadow-2xl `}
    >
      <div className="px-5 text-white text-center rounded-s bg-secondary flex items-center  relative   ">
        <div className="absolute left-full h-0 w-0 border-[22px] border-transparent  border-l-secondary  border-t-secondary   z-10"></div>
        News
      </div>
      <div className={`${style.hwrap} ${bgAlt} !bg-primary w-full rounded-e`}>
        <div className={style.hmove}>
          {/* {tickers?.length ? (
            tickers?.map((x, i) => (
              <div
                key={i}
                className={`${style.hitem}   whitespace-nowrap ${text1}`}
              >
                {x?.ticker}
              </div>
            ))
          ) : (
            <div className={`${style.hitem} whitespace-nowrap !text-white`}>
              &nbsp;
            </div>
          )} */}
        </div>
      </div>
    </div>
  );
};

export default Ticker;
