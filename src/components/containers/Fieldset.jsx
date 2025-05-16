import { bg, border, text2 } from "../../utils/themeColors";

const Fieldset= ({ title, className = "", children }) => {
  return (
    <fieldset className={`${border} border-solid ${bg}  p-3`}>
      <legend className={`font-extrabold text-xl mb-5 ${text2}`}>
        {title}
      </legend>
      <div className={`${className}`}>{children}</div>
    </fieldset>
  );
};

export default Fieldset;
