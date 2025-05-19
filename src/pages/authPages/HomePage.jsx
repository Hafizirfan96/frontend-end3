import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/navigation";
import "swiper/swiper-bundle.css";
import giz from "@/assets/giz.png";
import pvtc from "@/assets/pvtc.jpg";
import psdf from "@/assets/psdf.jpg";
import pbte from "@/assets/pbte.jpg";
import slide2 from "@/assets/slide2.png";
import tevta1 from "@/assets/tevta1.png";
import navtac from "@/assets/navtac.png";
import bureau from "@/assets/bureau.jpeg";
import psdalogo from "@/assets/psdalogo.png";
import psdflogo from "@/assets/psdflogo.png";
import pvtclogo from "@/assets/pvtcalogo.jpeg";
import tevcalogo from "@/assets/tevcalogo.png";
import pbtelogo from "@/assets/pbtelogo.jpeg";
import { useNavigate } from "react-router-dom";
import { Swiper, SwiperSlide } from "swiper/react";
import TopAchievers from "@/assets/Top-Achievers.png";
import NationalSkills from "@/assets/NationalSkills.png";
import employementTrends from "@/assets/employementTrends.png";
import { Autoplay, Navigation, Pagination } from "swiper/modules";
import tvtproviders from "@/assets/tvtproviders.png";
import SummeryCard from "@/components/templates/Home/SummeryCard";

const HomePage = () => {
  const showTvetSupply = false;
  const navigate = useNavigate();
  const navigatetoPages = (pages) => {
    navigate(pages);
  };

  const slidesData = [
    {
      // id: "/tvet-supply",
      image: NationalSkills,
      title: "Punjab Skills Information System (PSIS)",
      description:
        "With the establishment of PSIS, Government of Punjab is able to take stock of their capacity to produce and use skill information for evidence-based decision making at different levels. The system is helpful to formulate informed policies to duly adjust the demand and supply of skills ro make the TVET landscape better able to address the national and provincial unemployment challenges. ",
      buttonLabel: "Explore More",
      tab: "opportunities",
    },

    {
      id: "/tevta-page",
      image: tevta1,
      title: "Technical Education and Vocational Training Authority (TEVTA)",
      description:
        "TEVTA is a leading partner in the development of the Punjab by empowering youth through technical education and vocational training. It endeavors to enhance equal opportunities of employability for youth at home and abroad. It strives well to open new horizons of professional skills to equip the youth to meet challenges of globalization. ",
      buttonLabel: "Discover More",
      tab: "opportunities",
    },

    {
      id: "/employment-projections",
      image: pvtc,
      title: "Punjab Vocational Training Council (PVTC)",
      description:
        "Punjab Vocational Training Council (PVTC) is largest vocational training provider in Pakistan and have presence in all Sub-Districts (Tehsils) of Punjab - Pakistan.",
      buttonLabel: "Explore More",
      tab: "opportunities",
    },
    {
      id: "/employment-projections",
      image: slide2,
      title: "Punjab Skills Development Authority (PSDA)",
      description:
        "The Punjab Skills Development Authority (PSDA) is a regulatory body established in Punjab, Pakistan, to oversee the skills sector. Its primary objective is to ensure quality training and a skilled workforce by regulating and managing Technical and Vocational Education and Training (TVET) institutions, implementing national policies, and connecting supply with demand in the skills market. To promote and regulate technical education and vocational training sector in all over Punjab.",
      buttonLabel: "Discover More",
      tab: "opportunities",
    },
    {
      id: "/employment-projections",
      image: psdf,
      title: "Punjab Skills Development Fund (PSDF)",
      description:
        "PSDF was set up in 2010 as Pakistan’s largest skills development fund. It funds training for over 80,000 youth every year in 250+ demand-driven trades through an ecosystem of 500+ private sector training partners. Through PSDF, thousands of young men and women now have the skills they need to pursue their careers of choice. Explore from hundreds of training options in your city to find one that interests you.",
      buttonLabel: "Discover More",
      tab: "opportunities",
    },
    {
      id: "/employment-projections",
      image: pbte,
      title: "Punjab Board of Technical Education",
      description:
        "PBTE is a corporate body responsible to conduct the examinations of technical, commerce & vocational streams as well as the Short Courses below degree level in the territorial limits of the Province of Punjab under the provision of PBTE ACT, 1977. PBTE is striving to adapt the curricula based on competencies to meet the requirements of National Vocational Qualification Framework (NVQF).",
      buttonLabel: "Discover More",
      tab: "opportunities",
    },
    {
      id: "/employment-projections",
      image: slide2,
      title: "Employment Projections",
      description:
        "Evolving local and global employment trends that help understand shifting workforce dynamics have been drawn from a range of local reputable sources, as well as from the database of Bureau of Emigration and Overseas Employment for overseas employment opportunities. Information on gender-wise jobs, job listings in various technical fields, top occupations, regional stats, etc. provide a TVET jobs landscape. These insights will help the policy makers, TVET providers and learners in decision making by aligning TVET interventions with employment strategies. ",
      buttonLabel: "Discover More",
      tab: "opportunities",
    },
    {
      id: "/tvet-supply",
      image: slide2,
      title: "TVET Supply",
      description:
        "Statistics related to institutes, enrollment capacities, student-teacher ratios, graduate outcomes, and geographic distribution of facilities help develop insights for sectoral policy making for addressing supply-side needs and develop strategies that strengthen TVET sector workforce. Key outcomes of informed decision making include improved quality standards and programmes that are better aligned with market needs. ",
      buttonLabel: "See Supply",
      tab: "opportunities",
    },
    {
      id: "/institutes",
      image: tvtproviders,
      title: "TVET Providers",
      description: ` Career advisers for the youth looking to upskill or reskill
                      themselves.They can find pertinent information on institutes,
                      enrollment processes, gender distribution, faculty, institution
                      types and a lot other valueable information. A comprehensive picture is presented with
                      respect to the TVET providing institutes from both private
                      and public sectors according to their distribution across
                      districts. The bird’s eye view, inter alia,
                      helps provide a basis to address pertinent regional needs
                      for TVET institution building, according to local
                      demographic and skills needs.`,
      buttonLabel: "See Providers",
      tab: "institutes",
    },
    {
      id: "/institutes",
      image: TopAchievers,
      title: "Skills Opportunities",
      description:
        "Explore a wide horizon of training opportunities and certifications across industries both at local and global level. With ever changing world, the process of leraning, de-leraning and re-learning has become much more important to stay relevant in the TVET world. Skills Punjab takes the aspirants to the training avenues that are not only the most relevant but also the most meanningful. New and varied opportinities as per proclivities of the students is just round the corner with us. ",
      buttonLabel: "Explore Now",
      tab: "opportunities",
    },
    {
      id: "/jobs",
      image: employementTrends,
      title: "Employment Trends ",
      description:
        "Get information that facilitates forecasting and future projections for determining skilled workforce requirements of all regions and districts. Drawn from employer skill surveys and government data, projections included in this page offer a realistic view of evolving TVET sector needs. The information will better equip TVET providers, policy makers, and planners in devising future education and training programmes for skilling youth for the job market with better alignment with sectoral and Industry needs.  ",
      buttonLabel: "See Jobs",
      tab: "opportunities",
    },
  ];
  const totelSites = (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 640 512"
      fill="#267d37de"
    >
      <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z"></path>
    </svg>
  );
  const enrolledIcon = (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 640 512"
      fill="#267d37de"
    >
      <path d="M96 128a64 64 0 1 0 0-128 64 64 0 0 0 0 128zm224 0a64 64 0 1 0 0-128 64 64 0 0 0 0 128zM96 160C43 160 0 203 0 256v48c0 8.8 7.2 16 16 16h160v-64h64v64h160c8.8 0 16-7.2 16-16v-48c0-53-43-96-96-96H96zm224 0c-22.1 0-42.5 7.1-59.2 19H352c53 0 96 43 96 96v48c0 17.7-14.3 32-32 32h-49.6c-7.5-18.6-25.8-32-47.4-32s-39.9 13.4-47.4 32H176c-17.7 0-32-14.3-32-32v-48c0-53 43-96 96-96h80z" />
    </svg>
  );

  const totelGratudes = (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 640 512"
      fill="#267d37de"
    >
      <path d="M320 32L0 160l320 128 320-128L320 32zm0 288c-35.3 0-64 28.7-64 64v96h128v-96c0-35.3-28.7-64-64-64z" />
    </svg>
  );
  const totelAccessed = (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 640 512"
      fill="#267d37de"
    >
      <path d="M256 0C114.6 0 0 114.6 0 256c0 61.9 22.1 118.6 58.7 162.4l-10.2 66.4c-2.2 14.5 13.1 25.2 25.4 17.7l56.2-35.1c38.1 19.1 81.2 29.6 125.9 29.6 141.4 0 256-114.6 256-256S397.4 0 256 0zm0 464c-39.3 0-76.3-10.3-108.6-28.4l-60.2 37.6 10.6-69.1C67 360.6 48 310.8 48 256c0-114.9 93.1-208 208-208s208 93.1 208 208-93.1 208-208 208zm96-248h-64v-64h-64v64h-64v64h64v64h64v-64h64v-64z" />
    </svg>
  );
   const totelCertified = (
   <svg
  xmlns="http://www.w3.org/2000/svg"
  viewBox="0 0 512 512"
  fill="#267d37de"
>
  <path d="M256 8C119 8 8 119 8 256c0 53.9 17.5 103.7 47 144.1V504c0 4.4 3.6 8 8 8h40.1c2.1 0 4.2-.8 5.7-2.3l68.7-68.7c24.1 9.3 50.3 14.4 77.5 14.4s53.4-5.1 77.5-14.4l68.7 68.7c1.5 1.5 3.6 2.3 5.7 2.3H449c4.4 0 8-3.6 8-8v-103.9c29.5-40.4 47-90.2 47-144.1C504 119 393 8 256 8zm0 368c-66.3 0-120-53.7-120-120S189.7 136 256 136s120 53.7 120 120-53.7 120-120 120z"/>
</svg>

  );
  
  const totelPlacement = (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 640 512"
      fill="#267d37de"
    >
      <path d="M464 128h-80V96c0-35.3-28.7-64-64-64H192c-35.3 0-64 28.7-64 64v32H48C21.5 128 0 149.5 0 176v272c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V176c0-26.5-21.5-48-48-48zM192 96c0-17.7 14.3-32 32-32h128c17.7 0 32 14.3 32 32v32H192V96zm272 352H48V176h416v272z" />
    </svg>
  );
  const totelEmploymentTrends = (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 640 512"
      fill="#267d37de"
    >
      <path d="M320 336c0 8.8-7.2 16-16 16h-96c-8.8 0-16-7.2-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z"></path>
    </svg>
  );

  const emloymentProjection = (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 512 512"
      fill="#267d37de"
    >
      <path d="M496 384H64V80c0-8.8-7.2-16-16-16H16C7.2 64 0 71.2 0 80v336c0 17.7 14.3 32 32 32h464c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM464 96H345.9c-21.4 0-32.1 25.9-17 41l32.4 32.4L288 242.8l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0l-68.7 68.7c-6.3 6.3-6.3 16.4 0 22.6l22.6 22.6c6.3 6.3 16.4 6.3 22.6 0L192 237.3l73.4 73.4c12.5 12.5 32.8 12.5 45.3 0l96-96 32.4 32.4c15.1 15.1 41 4.4 41-17V112c0-8.8-7.2-16-16-16z"></path>
    </svg>
  );
  return (
    <div>
      <div className="w-full relative flex justify-center items-center">
        <Swiper
          spaceBetween={20}
          slidesPerView={1}
          modules={[Autoplay, Navigation, Pagination]}
          autoplay={{
            delay: 5000,
            disableOnInteraction: false,
          }}
          navigation={{
            nextEl: ".custom-next",
            prevEl: ".custom-prev",
          }}
          pagination={{ clickable: true }}
          className="w-full"
        >
          {slidesData.map((item, index) => (
            <SwiperSlide key={index} className="bg-white shadow-md rounded-xl">
              <div className="flex flex-col md:flex-row px-10 py-20 bg-[#049b63]">
                <div className="w-full md:w-1/3 mb-6 md:mb-0">
                  <img
                    className="w-full h-[300px] object-contain ml-8"
                    src={item.image}
                    alt={`Slide ${index + 1}`}
                  />
                </div>
                <div className="w-full md:w-[55%] mt-5 md:mt-0 md:pl-20 ml-8">
                  <h3 className="text-white text-[21px] font-semibold">
                    {item.title}
                  </h3>
                  <div className="py-5">
                    <p
                      className="text-white text-2xl leading-relaxed"
                      style={{
                        textAlign: "justify",
                        textJustify: "inter-word",
                      }}
                    >
                      {item.description}
                    </p>
                  </div>
                  <a
                    onClick={() => navigatetoPages(item.id)}
                    className="cursor-pointer inline-block bg-yellow-500 hover:bg-yellow-600 text-black text-2xl font-medium px-5 py-4 rounded mt-4 transition"
                  >
                    {item.buttonLabel}
                  </a>
                </div>
              </div>
            </SwiperSlide>
          ))}
        </Swiper>
        <style jsx>{`
          .swiper-pagination-bullet {
            width: 12px;
            height: 12px;
            background-color: #fff;
          }

          .swiper-pagination-bullet-active {
            background-color: #ffcc00; /* Customize active color */
            transform: scale(1.5); /* Increase size of active bullet */
          }
        `}</style>

        <div className="custom-prev absolute  left-2 top-1/2 transform -translate-y-1/2 z-10">
          <button className="w-16 h-16 text-3xl text-yellow-500 bg-black/50 hover:bg-black/70 rounded-full transition flex items-center justify-center">
            &#10094;
          </button>
        </div>
        <div className="custom-next absolute right-2 top-1/2 transform -translate-y-1/2 z-10">
          <button className="w-16 h-16 text-3xl text-yellow-500  bg-black/50 hover:bg-black/70 rounded-full transition flex items-center justify-center">
            &#10095;
          </button>
        </div>
      </div>

      <div className=" py-10 mt-16 px-20">
 

        <div className="gap-y-10 mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 px-20">
          <SummeryCard
            icon={totelSites}
            title="Training Sites"
            number="4,659"
            subtitle="Total Institutes"
          />
          <SummeryCard
            icon={enrolledIcon}
            title="Enrolled"
            number="303,659"
            subtitle="Total Enrolled"
            bgColor="bg-white"
          />
          <SummeryCard
            icon={totelGratudes}
            title="Graduate"
            number="203,659"
            subtitle="Total Graduate"
          />
          <SummeryCard
            icon={totelAccessed}
            title="Assessed"
            number="457,654"
            subtitle="Total Assessed"
            bgColor="bg-white"
          />
          <SummeryCard
            icon={totelCertified}
            title="Certified"
            number="457,654"
            subtitle="Total Certified"
            bgColor="bg-white"
          />
          <SummeryCard
            icon={totelPlacement}
            title="Placement"
            number="147,934"
            subtitle="Total Placement"
          />
          <SummeryCard
            icon={totelEmploymentTrends}
            title="Employment Trends"
            number="147,934"
            subtitle="Jobs"
            bgColor="bg-white"
          />
          <SummeryCard
            icon={emloymentProjection}
            title="Employment Projections"
            number="868,715"
            subtitle="Demand"
          />

          {/* <div className="bg-green-50 shadow p-6 flex flex-col items-center text-center">
            <div className="w-28 h-28 mb-4 mt-14">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"
                fill="#267d37de"
              >
                <path d="M496 384H64V80c0-8.8-7.2-16-16-16H16C7.2 64 0 71.2 0 80v336c0 17.7 14.3 32 32 32h464c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM464 96H345.9c-21.4 0-32.1 25.9-17 41l32.4 32.4L288 242.8l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0l-68.7 68.7c-6.3 6.3-6.3 16.4 0 22.6l22.6 22.6c6.3 6.3 16.4 6.3 22.6 0L192 237.3l73.4 73.4c12.5 12.5 32.8 12.5 45.3 0l96-96 32.4 32.4c15.1 15.1 41 4.4 41-17V112c0-8.8-7.2-16-16-16z"></path>
              </svg>
            </div>
            <h3 className="text-[18px] text-[#4e545a] font-medium">
              Employment Projections
            </h3>
            <div className="pt-44">
              <p className="text-green-700 text-[36px] font-bold">868,715</p>
              <p className="text-[18px] text-[#4e545a] font-medium">Demand</p>
            </div>
          </div> */}
        </div>

        <div className="mt-2 text-center text-[#4e545a] text-lg px-4">
          (Source: Employer Skill Survey, Qualification Awarding Bodies -
          2023/2024)
        </div>
      </div>

      <div className="grid grid-cols-3 mt-8  ">
        {[
          // {
          //   id: "/tvet-supply",
          //   title: "TVET Supply",
          //   description:
          //     "Explore insights on enrollments, gender, providers, and courses.",
          //   bgColor: "bg-teal-600",
          //   icon: "📈",
          // },
          {
            id: "/tvet-supply",
            title: "Trades",
            description:
              "Explore insights on enrollments, gender, providers, and courses.",
            bgColor: "bg-teal-600",
            icon: "📈",
          },
          {
            id: "/tvet-supply",
            title: "Workforce",
            description:
              "Explore insights on enrollments, gender, providers, and courses.",
            bgColor: "bg-purple-600",
            icon: "📈",
          },
          {
            id: "/tvet-supply",
            title: "Assessed and Certified",
            description:
              "Explore insights on enrollments, gender, providers, and courses.",
            bgColor: "bg-blue-600",
            icon: "📈",
          },
          {
            id: "/tvet-supply",
            title: "Placement",
            description:
              "Explore insights on enrollments, gender, providers, and courses.",
            bgColor: "bg-blue-600",
            icon: "📈",
          },
          {
            id: "/employment-projections",
            title: "Employment Projections",
            description:
              "Explore skilled workforce projections region, sector and district wise.",
            bgColor: "bg-green-600",
            icon: "📊",
          },
          {
            // id: "/district-map",
            title: "District Map",
            description:
              "Explore district level insights about TVET supply and demand indicators.",
            bgColor: "bg-indigo-700",
            icon: "🗺️",
          },
          {
            id: "/institutes",
            title: "TVET Providers",
            description:
              "Explore information on TVET institutes, companies offering training and programmes.",
            bgColor: "bg-slate-800",
            icon: "🏫",
          },
          {
            // id: "/tvet-supply",
            title: "Growth Sector",
            description:
              "Explore insights on growth sectors for employment and skill development.",
            bgColor: "bg-blue-600",
            icon: "📚",
          },
          {
            id: "/jobs",
            title: "Employment Trends",
            description:
              "Find trending employment opportunities in local and international job markets.",
            bgColor: "bg-gray-700",
            icon: "💼",
          },
          ...(showTvetSupply
            ? [
                {
                  id: "tvetSupply",
                  label: "tvetSupply",
                  icon: (
                    <>
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"></path>
                      <path d="M15 7a2 2 0 0 1 2 2"></path>
                      <path d="M15 3a6 6 0 0 1 6 6"></path>
                    </>
                  ),
                },
              ]
            : []),
        ].map((card, index) => (
          <div
            onClick={() => navigatetoPages(card.id)}
            key={index}
            className={`relative overflow-hidden  ${card.bgColor} text-white h-96 flex items-center justify-center p-6 transform transition-transform hover:scale-105`}
          >
            <div className="absolute top-0 left-0 w-1/2 h-full bg-black opacity-10 transform -skew-x-12"></div>
            <div className="absolute top-4 left-4 text-6xl opacity-30">
              {card.icon}
            </div>
            <div className="relative text-center">
              <h2 className="text-[30px] font-bold mb-2">{card.title}</h2>
              <p className="text-2xl italic">{card.description}</p>
            </div>
          </div>
        ))}
      </div>

      <div className="w-full text-center my-20 px-80">
        <h2 className="text-[35px] font-bold text-gray-800 mb-2">Partners</h2>
        <div
          className="max-w-[200px] h-[10px] mx-auto my-2 rounded-full"
          style={{
            background: "linear-gradient(90deg, #66cc66, #4caf50, #66cc66)",
            clipPath: "ellipse(50% 25% at 50% 50%)",
          }}
        ></div>

        <div className="overflow-x-auto whitespace-nowrap flex gap-6 justify-around items-center mt-8">
          <img src={navtac} className="h-28 inline-block" alt="Logo 4" />
          <img src={bureau} className="h-28 inline-block" alt="Logo 5" />
          <img src={giz} className="h-28 inline-block" alt="Logo 6" />
          <img src={psdalogo} className="h-28 inline-block" alt="Logo 6" />
          <img src={psdflogo} className="h-28 inline-block" alt="Logo 6" />
          <img src={pvtclogo} className="h-28 inline-block" alt="Logo 6" />
          <img src={tevcalogo} className="h-28 inline-block" alt="Logo 6" />
          <img src={pbtelogo} className="h-28 inline-block" alt="Logo 6" />
        </div>
      </div>
    </div>
  );
};

export default HomePage;
