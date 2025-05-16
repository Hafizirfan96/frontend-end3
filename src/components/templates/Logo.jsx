import logo from "../../assets/logo.png";
const Logo= ({width=150,height=150}) => {
  return (
    <div className="text-center">
      <img
        loading="lazy"
        src={logo}
        alt="logo"
        width={width}
        height={height}
        className="inline-block  "
      />
    </div>
  );
};

export default Logo;
