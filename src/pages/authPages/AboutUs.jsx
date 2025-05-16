import Footer from "./DashboardPages/Components/Footer";
import Header from "./DashboardPages/Components/Header";

const AboutUs = () => {
  return (
    <div>
      <Header />
      <div className="Browse bg-[#478e51] mb-8">
        <div className="h-5" />
        <div className="flex items-center">
          <div className=" ml-16">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 512 512"
              fill="#e2e028ed"
              className="w-12 h-12"
            >
              <path d="M16 128h416c8.8 0 16-7.2 16-16V48c0-8.8-7.2-16-16-16H16C7.2 32 0 39.2 0 48v64c0 8.8 7.2 16 16 16zm480 80H80c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h416c8.8 0 16-7.2 16-16v-64c0-8.8-7.2-16-16-16zm-64 176H16c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h416c8.8 0 16-7.2 16-16v-64c0-8.8-7.2-16-16-16z" />
            </svg>
          </div>
          <h2 className="text-light text-[20px] text-bold ml-3 text-white BrowseTitle">
            About Us
          </h2>
        </div>
        <div className="h-8" />
      </div>

      <div className="pl-3 pr-3">
        <blockquote className="border-l-4 pl-4 border-[#e2e028ed]">
          <h2 className="text-[24px] text-[#267d37de] font-bold ">
            Introduction
          </h2>
        </blockquote>

        <div className="row gap-4">
          <div className="col-12 col-sm-12 col-md-9">
            <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4">
              <p
                className="pr-3 text-2xl"
                style={{
                  textAlign: "justify",
                  textJustify: "inter-word",
                }}
              >
                Economic development of a nation depends significantly on good
                policies along with optimal use of available resources,
                including human resources. Poverty reduction and wealth
                generation are the most desirable outcomes of economic
                development. Most important in this respect are skilled,
                educated and well-trained human resources. To produce the same
                by informing relevant policies, first-hand information on key
                parameters is crucial. These include characteristics of the
                existing skilled workforce, such as distribution by region and
                gender, age composition, skill level, productivity, etc. As
                countries across the globe aspire to increase their productivity
                and competitiveness amid social and economic impact of
                globalization, timely and relevant skills/labour market
                information is becoming increasingly important.
              </p>

              <p className="pr-5 text-2xl">
                SDED developed the Punjab Skills Information System (PSIS) to
                ensure better linkages for employers and employees, providing
                real-time updates and analyses of future projections. Time
                series and cross sectional analyses make identification of
                potential areas of improvement easier. This is expected to
                maximise placements of Punjab’s TVET institutes.
                {/* under the TVET Reform Support Programme, which is
                co-funded by the European Union and the Federal Republic of
                Germany. The Deutsche Gesellschaft für Internationale
                Zusammenarbeit (GIZ) GmbH implements the Programme together with
                the British Council in close cooperation with the National
                Vocational and Technical Training Commission and other public
                and private sector organizations in Balochistan, Gilgit
                Baltistan, Khyber Pakhtunkhwa, and Punjab. The programme's
                objective is to support the development of Pakistan's TVET
                sector, focusing on training for men and women in professions
                with high demand, especially in digital and green skills. */}
              </p>
            </div>

            <div className="py-4">
              <blockquote className="border-l-4 pl-4 border-[#e2e028ed]">
                <h2 className="text-[24px] text-[#267d37de] font-bold ">
                  Objectives
                </h2>
              </blockquote>
            </div>
            <div className="shadow-lg bg-white p-4">
              <p className="pr-3"></p>

              <p className="pr-5 text-2xl">
                <li>
                  Develop a reliable Skills Information System for a demand
                  driven workforce development in line with market and demand
                  analyses;
                </li>
                <li>
                  Provide information to TVET stakeholders for demand and supply
                  analysis; facilitating networking, information dissemination
                  and deliberations/exchanges on TVET Plans.
                </li>
              </p>
              <p className="pr-5 text-2xl">
                <li>
                  Establish and facilitate career guidance and placement
                  services for TVET graduates and potential employers through
                  smooth flow of information on skills demand.
                </li>
              </p>
            </div>
            <div className="box-shadow-web bg-white p-4 mt-8"></div>
          </div>
        </div>
      </div>
      <Footer />
    </div>
  );
};

export default AboutUs;
