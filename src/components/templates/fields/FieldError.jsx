import { motion } from "framer-motion";
import { stringSplit } from "../../../utils/helper";

const FieldError = ({ form, name }) => {
    return (
        <>
            {form.register && form.formState.errors[name.split(".")[0]] && (
                <motion.p
                    initial={{ opacity: 0, y: -10 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ duration: 0.2 }}
                    className={`text-red-600  absolute -bottom-8  text-lg`}
                >
                    {stringSplit(form.formState.errors, name)?.message}
                </motion.p>
            )}
            {/* {form.register && name && form.formState.errors && (
                <motion.p
                    initial={{ opacity: 0, y: -10 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ duration: 0.2 }}
                    className={`text-red-600  absolute -bottom-8  text-lg`}
                >
                    {form.formState.errors[name]?.message}
                </motion.p>
            )} */}
        </>
        // <motion.p
        //     initial={{ opacity: 0, y: -10 }}
        //     animate={{ opacity: 1, y: 0 }}
        //     transition={{ duration: 0.2 }}
        //     className={`text-red-600  absolute -bottom-8  text-lg`}
        // >
        //     {form.formState.errors[name]?.message}
        // </motion.p>
    )
}

export default FieldError