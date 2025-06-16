import React, { useState } from "react";
import { Formik, ErrorMessage } from "formik";
import * as Yup from "yup";
import { Link } from "react-router-dom";

const AdminInstitutes = () => {
  const [url, setUrl] = useState("");
  const [state, setState] = useState({
    name: "",
    coach: "",
    cell_number: "",
    pool_address: "",
    mailing_address: "",
    bank_name: "",
    account_number: "",
    routing_number: "",
    price: "",
    payment_type: "",
    csv: "Undefined",
  });

  const initialValues = {
    name: "",
    coach_name: "",
    coach_email: "",
    cell_number: "",
    pool_address: "",
    mailing_address: "",
    bank_name: "",
    account_number: "",
    routing_number: "",
    price: "",
    payment_type: "0",
    csv: "Undefined",
  };

  const validationSchema = Yup.object({
    name: Yup.string().required("Required"),
    coach_name: Yup.string().required("Required"),
    coach_email: Yup.string().email("Invalid email").required("Required"),
    cell_number: Yup.string().required("Required"),
    pool_address: Yup.string().required("Required"),
    mailing_address: Yup.string().required("Required"),
    bank_name: Yup.string().required("Required"),
    account_number: Yup.string().required("Required"),
    routing_number: Yup.string().required("Required"),
    price: Yup.string().required("Required"),
  });

  const onSubmit = async (values) => {
    console.log("Submitted values:", values);

  };

  return (
   
     <>
  <h1 className="text-4xl font-extrabold mb-8 text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-500">
    Institute Data
  </h1>

 <Formik initialValues={initialValues} validationSchema={validationSchema} onSubmit={onSubmit}>
        {({ values, handleChange, handleBlur, handleSubmit }) => (
          <form onSubmit={handleSubmit}>
            {/* Institute Info */}
            <div className="grid md:grid-cols-3 sm:grid-cols-2 gap-8">
              {[
                { name: "name", placeholder: "Institute Name" },
                { name: "coach_name", placeholder: "Principal Name" },
                { name: "coach_email", placeholder: "Principal Email", type: "email" },
                { name: "cell_number", placeholder: "Contact Number" },
                {
                  name: "pool_address",
                  placeholder: "Institute Address: 123 Main St, City, ST, 12345",
                },
                {
                  name: "mailing_address",
                  placeholder: "Mailing Address: 123 Main St, City, ST, 12345",
                },
              ].map(({ name, placeholder, type = "text" }) => (
                <div key={name}>
                  <label className="block text-3xl font-semibold text-gray-800 mb-2">
                    {placeholder}
                  </label>
                  <input
                    type={type}
                    name={name}
                    onChange={handleChange}
                    onBlur={handleBlur}
                    value={values[name]}
                    placeholder={placeholder}
  className="w-full px-5 py-8 border rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-2xl placeholder:text-2xl transition"
                  />
                  <ErrorMessage name={name} component="div" className="text-red-500 text-3xl mt-1" />
                </div>
              ))}

              {/* File Upload */}
              <div className="col-span-full">
                <label className="block text-base font-semibold text-gray-800 mb-3">
                  Attach File
                </label>
                <input
                  type="file"
                  name="csv_file"
                  className="block w-full text-sm text-gray-600 file:mr-4 file:py-3 file:px-4
                    file:rounded-lg file:border-0 file:text-sm file:font-semibold
                    file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                />
              </div>
            </div>

            {/* Action Buttons */}
            <div className="flex justify-end space-x-6 mt-12">
              <Link to="/institutes">
                <button
                  type="button"
                  className="px-6 py-3 border border-blue-600 text-blue-600 rounded-xl hover:bg-blue-50 transition font-semibold text-lg"
                >
                  Cancel
                </button>
              </Link>
              <button
                type="submit"
                className="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition font-semibold text-lg"
              >
                Submit
              </button>
            </div>
          </form>
        )}
      </Formik>
</>

  
  );
};

export default AdminInstitutes;
