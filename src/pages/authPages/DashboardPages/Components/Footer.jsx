import logo from "@/assets/logo.png";

const Footer = () => {
  return (
    <div>
      {/* <div className="w-full bg-[#edefed] shadow-md rounded-md px-24  card-shadow-footer col-md-12 col-12 disclaimer">
        <div className="px-36 py-10">
          <div className="flex items-center  ">
            <h3 className="text-3xl font-semibold text-gray-800">Disclaimer</h3>
          </div>

          <p className="text-xl text-gray-600 leading-relaxed mt-4">
            This website has been developed with the assistance of the TVET
            Sector Support Programme, funded by the European Union, the Federal
            Republic of Germany and the Royal Norwegian Embassy. The Programme
            is implemented by the Deutsche Gesellschaft für Internationale
            Zusammenarbeit (GIZ) GmbH in close collaboration with the National
            Vocational and Technical Training Commission (NAVTTC) and a number
            of public and private sector organizations at the national and
            provincial/regional levels. The content of this website is the sole
            responsibility of the partner organization(s) and doesn't reflect
            the views of the TVET Sector Support Programme.
          </p>
        </div>
      </div> */}

      <footer
        className="bg-[#004614] text-white py-12"
        aria-label="Footer with contact and legal info"
      >
        <div
          className="mx-auto px-4 flex flex-col md:flex-row justify-between"
          style={{ maxWidth: "120rem" }}
        >
          <div className="md:w-2/3 w-full mb-6 md:mb-0">
            <div>
              <div className="flex items-center mb-4">
                <h3 className="text-[25px]  font-bold">Contact info</h3>
                {/* <div className="w-12 h-1 bg-[#156045] ml-3 mt-2 rounded-full"></div> */}
              </div>

              <p className="text-2xl mb-1">
                Punjab Skills Information System(PSIS) .
              </p>
              <p className="text-lg mb-3">
                21-A H Block, Dr Mateen Fatima Rd,Gulberg 2, Lahore
              </p>

              <h6 className="text-lg mb-3">
                <i className="fa fa-phone mr-2"></i> 042-99332651
                <i className="fa fa-envelope ml-4 mr-2"></i>{" "}
                info@skillpunjab.org
              </h6>

              <h6 className="flex items-center text-lg space-x-4">
                <a
                  href="#"
                  className="hover:text-green-400 inline-flex items-center"
                >
                  <i className="fa fa-facebook-f mr-1"></i> Skill Punjab
                </a>
                <a href="#" className="hover:text-green-400">
                  Login
                </a>
                <span>/</span>
                <a href="#" className="hover:text-green-400">
                  Register
                </a>
              </h6>
            </div>
          </div>

          <div className="md:w-1/2 w-full flex justify-center items-center">
        
            <div className="flex justify-center items-center ">
              <img
                src={logo}
                className="img-fluid img-logo h-[100px] object-contain"
                alt="Logo"
              />
              <div>
                <h3 className="text-[12px] text-white ml-4">
                  {/* SD/ED */}
                  Skill Development & Entrepreneurship Department (SD&ED)
                </h3>
                <h3 className="text-[10px] text-white ml-4">
                  Punjab Skills Information System(PSIS)
                </h3>
              </div>
            </div>
          </div>
        </div>

        <div className="pt-6 text-center text-lg text-gray-300">
          <p>
            {/* &copy; 2024 Powered by Punjab Skill Information System */}
          </p>
        </div>
      </footer>
    </div>
  );
};
export default Footer;
