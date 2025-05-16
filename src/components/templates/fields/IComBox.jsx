import { useEffect, useState } from "react";
import Button from "../Button";
import FieldError from "./FieldError";

const IComboBox = ({
    form,
    title,
    options = [],
    disabled = false,
    name = "",
    // setValue,
    setIsAddNew,
    onChange,
    onBlur,
    placeholder
}) => {
    const [query, setQuery] = useState("");
    const [isOpen, setIsOpen] = useState(false);

    const filteredOptions = options?.filter((option) => option?.title?.toLowerCase().includes(query?.toLowerCase()));

    useEffect(() => {
        if (form.getValues(name)) {
            const find = options?.find((x) => x.value == form.getValues(name))?.title;
            setQuery(find);
        }
    }, [form.getValues(name)]);

    const onChangeHandler = (values) => {
        onChange && onChange(values)
        form.setValue(name, values.value);
        setQuery(values.title);
        setIsOpen(false);

        setIsAddNew && setIsAddNew(() => false);
    };
    useEffect(() => {
        setQuery(form.watch(name) || "")
    }, [form.watch(name)])

    return (
        <div className="space-y-2 relative ">
            {title && (
                <label className={`font-bold text-xl h-text `}>
                    {title}
                </label>
            )}
            <div className="relative rounded-full b-bg">
                <input
                    name={name}
                    {...form.register(name, { onBlur: onBlur })}
                    type="text"
                    disabled={disabled}
                    className={`rounded-md  w-full bg-transparent focus:outline-none capitalize p-5 text-xl font-normal 
            outline-none  ${disabled && `cursor-not-allowed`} `}
                    placeholder={title && `${placeholder ? placeholder : "Select"} ${title?.toLowerCase()}`}
                    value={query}
                    onChange={(e) => {
                        setQuery(e.target.value);
                        setIsOpen(true);
                        form.setValue(name, "");
                    }}
                    onFocus={() => setIsOpen(true)}
                    onBlur={() => {
                        if (form.getValues(name) !== query) setQuery("");

                        setTimeout(() => setIsOpen(false), 100);
                    }}
                />
                
                {isOpen && (
                    <div className="z-50 absolute mt-1 w-full f-bg border border-gray-300 rounded-md shadow-lg max-h-60 overflow-y-auto ">
                        {filteredOptions.length > 0 ? (
                            filteredOptions.map((option, index) => (
                                <div
                                    key={index}
                                    className="hover:bg-gray-100 hover:dark:bg-gray-700 px-3 py-2 cursor-pointer text-lg text-left"
                                    onClick={() =>
                                        onChangeHandler({
                                            value: option?.value,
                                            title: option?.title
                                        })
                                    }
                                >
                                    {option?.title}
                                </div>
                            ))
                        ) : (
                            <div className="px-3 py-2 text-gray-500 text-lg">
                                No options found
                            </div>
                        )}
                        {setIsAddNew ? (
                            <div
                                key={"109x"}
                                className="hover:bg-gray-100 px-3 py-2 cursor-pointer text-lg"
                            >
                                <Button
                                    onClick={() => {
                                        setIsAddNew(() => true);
                                        form.setValue(name, "");
                                        setQuery("");
                                    }}
                                    className="text-sm !font-normal !py-0 !px-1 !rounded-none"
                                >
                                    Add New
                                </Button>
                            </div>
                        ) : null}
                    </div>
                )}
            </div>
            <FieldError name={name} form={form} />
        </div>
    );
};

export default IComboBox;
