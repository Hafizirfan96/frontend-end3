import {
  bgSoft,
  bgElv,
  text1,
  text2,
  border,
} from "../../../utils/themeColors";

import { motion } from "framer-motion";

const TextArea = ({ title, register, disabled = false, errors }) => {
  return (
    <div className="space-y-2 relative mb-5">
      {title && <label className={`font-bold text-sm ${text1}`}>{title}</label>}
      <textarea
        {...register}
        className={`rounded-md ${
          disabled ? bgElv : bgSoft
        } ${border} text-sm w-full outline-none px-3 py-2.5 ${
          disabled && `cursor-not-allowed ${text2}`
        } `}
        disabled={disabled}
        rows={4}
        placeholder={title && `Enter ${title.toLowerCase()}`}
      />

      {register && register.name && errors && errors[register.name] && (
        <motion.p
          initial={{ opacity: 0, y: -10 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.2 }}
          className={`text-red-600  absolute -bottom-4  text-xs`}
        >
          {errors[register.name]?.message}
        </motion.p>
      )}
    </div>
  );
};

export default TextArea;
