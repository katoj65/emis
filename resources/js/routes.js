
import School from './Pages/Dashboard/School';
import LearnersPage from './Pages/Student/LearnersPage';
import TeachersPage from './Pages/Teachers/TeachersPage';
import SearchPage from './Pages/Dashboard/SearchPage';
import EnrolPage from './Pages/Student/EnrolPage'
import Login from './Pages/Auth/Login';
import ReportsPage from './Pages/Reports/ReportsPage';
import DownloadsPage from './Pages/Documents/DownloadsPage';
import UploadPage from './Pages/Documents/UploadPage';
import DocumentTemplatesPage from './Pages/Documents/DocumentTemplatesPage';
import SchoolsPage from './Pages/School/SchoolsPage';
import AllSchoolsPage from './Pages/School/AllSchoolsPage';
import ProfilePage from './Pages/User/ProfilePage';
import SchoolDistribution from './Pages/Charts/SchoolDistribution';
import SchoolFunding from './Pages/Charts/SchoolFunding';
import PrePrimaryAttachment from './Pages/Charts/PrePrimaryAttachment';
import DistanceToDeo from './Pages/Charts/DistanceToDeo';
import GradeCategory from './Pages/Charts/GradeCategory';
import EarlyEnrolment from './Pages/Charts/EarlyEnrolment';
import SpecialNeeds from './Pages/Charts/SpecialNeeds';
import NotificationsPage from './Pages/User/NotificationsPage';
import MainLandingPage from './Pages/Dashboard/MainLandingPage';
import EnrolmentPage from './Pages/Dashboard/EnrolmentPage';
//primary enrolment
import PrimaryEnrolmentByAge from './Pages/Reports/PrimaryEnrolmentByAge';
import PrimaryEnrolmentByClass from './Pages/Reports/PrimaryEnrolmentByClass';
import PrimaryEnrolmentByRegion from './Pages/Reports/PrimaryEnrolmentByRegion';
import PrimaryEnrolmentByNationalityClass from './Pages/Reports/PrimaryEnrolmentByNationalityClass';
import PrimaryRegistrationPage from './Pages/Dashboard/PrimaryRegistrationPage';
import PrimarySchoolBoardingType from './Pages/Dashboard/PrimarySchoolBoardingType';
import PrimarySchoolLicensing from './Pages/Dashboard/PrimarySchoolLicensing';
//PrimaryDistribution
import PrimaryDistributionPage  from './Pages/Dashboard/PrimaryDistributionPage';
//primary distance to key locations
 import PrimaryDistanceToKeyPage from './Pages/Dashboard/PrimaryDistanceToKeyPage';
//Teachers

import TeacherPage from './Pages/Dashboard/TeacherPage';
import PrimaryTextbookPage from './Pages/Dashboard/PrimaryTextbookPage';
import PrimaryWaterSourcePage from './Pages/Dashboard/PrimaryWaterSourcePage';
//PrimaryNonTeachingStaff
import PrimaryNonTeachingStaff from './Pages/Dashboard/PrimaryNonTeachingStaff';
import Nationality from './Pages/Dashboard/Nationality';
import GenderComposition from './Pages/Dashboard/GenderComposition';
import PrimaryReaders from './Pages/Dashboard/PrimaryReaders';
import PrimaryGuides from './Pages/Dashboard/PrimaryGuides';




//segment 1.
var preprimary='/pre-primary/';
var primary='/primary/';
var secondary='/secondary/';
var ptc='/ptc/';
var bvtvet='/bvtvet/';
var university='/university/';






export const routes = [
//enrolment reports

{
name: 'Enrolment by Age',
path: '/report/primary/enrolment-by-age',
component: PrimaryEnrolmentByAge,
},

{
name: 'Enrolment by Class',
path: '/report/primary/enrolment-by-class',
component: PrimaryEnrolmentByClass,
},


{
name: 'Enrolment by Region',
path: '/report/primary/enrolment-by-region',
component: PrimaryEnrolmentByRegion,
},


{
name: 'Enrolment by Nationality and Class',
path: '/report/primary/enrolment-by-nationality-class',
component: PrimaryEnrolmentByNationalityClass,
},

{
name: 'dashboard',
path: '/dashboard',
component: School,
},

{
name: 'learners',
path: '/learners',
component: LearnersPage,

},
{
name: 'teachers',
path: '/teachers',
component: TeachersPage,

},
{
name: 'search',
path: '/search',
component: SearchPage,

},
{
name: 'enrol',
path: '/dashboard/enrolment',
component:EnrolPage,


},
{
name: 'login',
path: '/login',
component: Login,
},

{
name: 'login',
path: '/',
component: Login,
},

{
name: 'reports',
path: '/reports',
component: ReportsPage,
},
{
name: 'downloads',
path: '/documents/downloads',
component: DownloadsPage,
},
{
name: 'uploads',
path: '/documents/uploads',
component: UploadPage,
},
{
name: 'templates',
path: '/documents/templates',
component: DocumentTemplatesPage,
},
{
name: 'schools',
path: '/dashboard/schools',
component: SchoolsPage,
},

{
name: 'All Schools',
path: '/schools',
component: AllSchoolsPage,
},

{
name: 'profile',
path: '/user/profile',
component: ProfilePage,
},
{
name: 'School Distribution',
path: '/school-distribution/pre-primary',
component: SchoolDistribution,
},
{
name: 'School Funding',
path: '/school/funding',
component: SchoolFunding,
},
{
name: 'Attachment',
path: '/school/pre-primary-attached',
component: PrePrimaryAttachment,
},
{
name: 'Distance to Deo',
path: '/school/distance-to-deo',
component: DistanceToDeo,
},
{
name: 'Grade Category',
path: '/enrolment/grade-category',
component: GradeCategory,
},
{
name: 'Early Childhood',
path: '/enrolment/early-childhood',
component: EarlyEnrolment,
},
{
name: 'Special Needs',
path: '/pupil/special-needs',
component: SpecialNeeds,
},



{
name: 'Notification Page',
path: '/user/notifications',
component: NotificationsPage,
},




//education level

{
name: 'School Distribution',
path: preprimary+'school-distribution',
component: MainLandingPage,
},


{
name: 'Distance to Key Location',
path: preprimary+'key-location-distance',
component: MainLandingPage,
},

{
name:'Registration Status',
path:preprimary+'registration-status',
component:MainLandingPage,
},

{
name:'School Ownership',
path:preprimary+'school-ownership',
component:MainLandingPage,
},

{
name:'Boarding Status',
path:preprimary+'boarding',
component:MainLandingPage,
},

{
name:'School Funding',
path:preprimary+'funding',
component:MainLandingPage,
},
//infrastructure
{
name:'Infrastructure Category',
path:preprimary+'infrastructure-category',
component:MainLandingPage,
},

{
name:'Sanitation Facilities',
path:preprimary+'sanitation-facilities',
component:MainLandingPage,
},

{
name:'Text Books',
path:preprimary+'text-books',
component:MainLandingPage,
},

{
name:'Instructional Material',
path:preprimary+'instructional-material',
component:MainLandingPage,
},

{
name:'Lab Equipment',
path:preprimary+'lab-equipment',
component:MainLandingPage,
},

{
name:'Water Sources',
path:preprimary+'water-sources',
component:MainLandingPage,
},

{
name:'Energy Sources',
path:preprimary+'energy-sources',
component:MainLandingPage,
},

{
name:'Stances Availability',
path:preprimary+'stances-availability',
component:MainLandingPage,
},

{
name:'Enrolment',
path:preprimary+'enrolment',
component:MainLandingPage,
},

{
name:'Orphanage',
path:preprimary+'orphanage',
component:MainLandingPage,
},

{
name:'Special Needs',
path:preprimary+'special-needs',
component:MainLandingPage,
},

{
name:'Learner Transfers',
path:preprimary+'learner-transfer',
component:MainLandingPage,
},


{
name:'Class Repeatition',
path:preprimary+'class-repeatition',
component:MainLandingPage,
},


{
name:'Seating Capacity',
path:preprimary+'seating-capacity',
component:MainLandingPage,
},



{
name:'Dropout Status',
path:preprimary+'dropout-status',
component:MainLandingPage,
},


{
name:'Activity Categories',
path:preprimary+'activity-category',
component:MainLandingPage,
},


{
name:'Participation',
path:preprimary+'participation',
component:MainLandingPage,
},


{
name:'Budget & Expenditure',
path:preprimary+'budget',
component:MainLandingPage,
},


{
name:'Equipment & Facilities',
path:preprimary+'equipment',
component:MainLandingPage,
},


{
name:'Teaching Staff',
path:preprimary+'teaching-staff',
component:MainLandingPage,
},

{
name:'Non-Teaching Staff',
path:preprimary+'non-teaching-staff',
component:MainLandingPage,
},

{
name:'Teacher Exodus',
path:preprimary+'teacher-exodus',
component:MainLandingPage,
},

{
name:'HIV/AIDS',
path:preprimary+'hiv-aids',
component:MainLandingPage,
},


{
name:'GER',
path:preprimary+'ger',
component:MainLandingPage,
},

{
name:'NER',
path:preprimary+'ner',
component:MainLandingPage,
},

{
name:'PTR',
path:preprimary+'ptr',
component:MainLandingPage,
},

{
name:'PCR',
path:preprimary+'pcr',
component:MainLandingPage,
},

{
name:'PSR',
path:preprimary+'psr',
component:MainLandingPage,
},




//primary

{
    name:'Nationality',
    path:primary+'nationality',
    component:Nationality,
},
{
    name:'Gender Composition',
    path:primary+'gender-composition',
    component:GenderComposition,
},
{
    name:'Governance',
    path:primary+'governance',
    component:MainLandingPage,
},

{
    name:'Performance',
    path:primary+'performance',
    component:MainLandingPage,
},


{
    name:'Attendance',
    path:primary+'attendance',
    component:MainLandingPage,
},

{
    name:'Transfers',
    path:primary+'transfers',
    component:MainLandingPage,
},



{
    name:'Dropouts',
    path:primary+'dropouts',
    component:MainLandingPage,
},


{
    name:'Special Needs',
    path:primary+'special-needs',
    component:MainLandingPage,
},




{
    name:'Orphanage',
    path:primary+'orphanage',
    component:MainLandingPage,
},



{
    name:'Non-Teaching Staff',
    path:primary+'non-teaching-staff',
    component:PrimaryNonTeachingStaff,
},


{
    name:'In-Service Training',
    path:primary+'in-service-training',
    component:MainLandingPage,
},



{
    name:'Teacher Transfer',
    path:primary+'teacher-transfer',
    component:MainLandingPage,
},


{
    name:'Teacher Exodus',
    path:primary+'teacher-exodus',
    component:MainLandingPage,
},


{
    name:'Source Of Water',
    path:primary+'source-of-water',
    component:PrimaryWaterSourcePage,
},


{
    name:'Proximity',
    path:primary+'proximity',
    component:MainLandingPage,
},



{
    name:'Consumption Rate',
    path:primary+'consumption-rate',
    component:MainLandingPage,
},


{
    name:'Hand Washing Facilities',
    path:primary+'hand-washing-facilities',
    component:MainLandingPage,
},


{
    name:'Garbage Disposal',
    path:primary+'garbage-disposal',
    component:MainLandingPage,
},


{
    name:'Cooking Energy',
    path:primary+'cooking-energy',
    component:MainLandingPage,
},


{
    name:'Lighting',
    path:primary+'lighting',
    component:MainLandingPage,
},


{
    name:'Computer Inventory',
    path:primary+'computer-inventory',
    component:MainLandingPage,
},


{
    name:'Internet Access',
    path:primary+'internet-access',
    component:MainLandingPage,
},



{
    name:'Teaching Guides',
    path:primary+'teaching-guides',
    component:PrimaryGuides,
},


{
    name:'Readers',
    path:primary+'readers',
    component:PrimaryReaders,
},


{
    name:'Issue Occurrence',
    path:primary+'issue-occurrence',
    component:MainLandingPage,
},



{
    name:'Health Policy',
    path:primary+'health-policy',
    component:MainLandingPage,
},


{
    name:'Health Skills',
    path:primary+'health-skills',
    component:MainLandingPage,
},

{
    name:'Feeding',
    path:primary+'feeding',
    component:MainLandingPage,
},

{
    name:'Food Sources',
    path:primary+'food-source',
    component:MainLandingPage,
},


{
    name:'Sports Facilities',
    path:primary+'sports_facilities',
    component:MainLandingPage,
},

{
    name:'Sports Equipment',
    path:primary+'sports_equipment',
    component:MainLandingPage,
},

{
    name:'Participation',
    path:primary+'participation',
    component:MainLandingPage,
},

{
    name:'Learner Training',
    path:primary+'learner-training',
    component:MainLandingPage,
},

{
    name:'Teacher Training',
    path:primary+'teacher-training',
    component:MainLandingPage,
},


{
    name:'Capitation Grant',
    path:primary+'capitation-grant',
    component:MainLandingPage,
},

{
    name:'Other Income',
    path:primary+'other-income',
    component:MainLandingPage,
},


{
    name:'Operations',
    path:primary+'operations',
    component:MainLandingPage,
},




{
    name:'Licensing',
    path:primary+'licensing',
    component:PrimarySchoolLicensing

},



{
    name:'Border Status',
    path:primary+'border-status',
    component:PrimarySchoolBoardingType

},

{
    name: 'School Distribution',
    path: primary+'school-distribution',
    component: PrimaryDistributionPage,
    },


{
name:'Registration',
path:primary+'registration',
component: PrimaryRegistrationPage
},


    {
    name: 'Distance to Key Location',
    path: primary+'key-location-distance',
    component: PrimaryDistanceToKeyPage,
    },

    {
    name:'Registration Status',
    path:primary+'registration-status',
    component:MainLandingPage,
    },

    {
    name:'School Ownership',
    path:primary+'school-ownership',
    component:MainLandingPage,
    },

    {
    name:'Boarding Status',
    path:primary+'boarding',
    component:MainLandingPage,
    },

    {
    name:'School Funding',
    path:primary+'funding',
    component:MainLandingPage,
    },
    //infrastructure
    {
    name:'Infrastructure Category',
    path:primary+'infrastructure-category',
    component:MainLandingPage,
    },

    {
    name:'Sanitation Facilities',
    path:primary+'sanitation-facilities',
    component:MainLandingPage,
    },

    {
    name:'Text Books',
    path:primary+'text-books',
    component:PrimaryTextbookPage,
    },

    {
    name:'Instructional Material',
    path:primary+'instructional-material',
    component:MainLandingPage,
    },

    {
    name:'Lab Equipment',
    path:primary+'lab-equipment',
    component:MainLandingPage,
    },

    {
    name:'Water Sources',
    path:primary+'water-sources',
    component:MainLandingPage,
    },

    {
    name:'Energy Sources',
    path:primary+'energy-sources',
    component:MainLandingPage,
    },

    {
    name:'Stances Availability',
    path:primary+'stances-availability',
    component:MainLandingPage,
    },

    {
    name:'Enrolment',
    path:primary+'enrolment',
    component:EnrolmentPage,
    },

    {
    name:'Orphanage',
    path:primary+'orphanage',
    component:MainLandingPage,
    },

    {
    name:'Special Needs',
    path:primary+'special-needs',
    component:MainLandingPage,
    },

    {
    name:'Learner Transfers',
    path:primary+'learner-transfer',
    component:MainLandingPage,
    },


    {
    name:'Class Repeatition',
    path:primary+'class-repeatition',
    component:MainLandingPage,
    },


    {
    name:'Seating Capacity',
    path:primary+'seating-capacity',
    component:MainLandingPage,
    },



    {
    name:'Dropout Status',
    path:primary+'dropout-status',
    component:MainLandingPage,
    },


    {
    name:'Activity Categories',
    path:primary+'activity-category',
    component:MainLandingPage,
    },


    {
    name:'Participation',
    path:primary+'participation',
    component:MainLandingPage,
    },


    {
    name:'Budget & Expenditure',
    path:primary+'budget',
    component:MainLandingPage,
    },


    {
    name:'Equipment & Facilities',
    path:primary+'equipment',
    component:MainLandingPage,
    },


    {
    name:'Teaching Staff',
    path:primary+'teaching-staff',
    component:TeacherPage,
    },

    {
    name:'Non-Teaching Staff',
    path:primary+'non-teaching-staff',
    component:PrimaryNonTeachingStaff,
    },

    {
    name:'Teacher Exodus',
    path:primary+'teacher-exodus',
    component:MainLandingPage,
    },

    {
    name:'HIV/AIDS',
    path:primary+'hiv-aids',
    component:MainLandingPage,
    },


    {
    name:'GER',
    path:primary+'ger',
    component:MainLandingPage,
    },

    {
    name:'NER',
    path:primary+'ner',
    component:MainLandingPage,
    },

    {
    name:'PTR',
    path:primary+'ptr',
    component:MainLandingPage,
    },

    {
    name:'PCR',
    path:primary+'pcr',
    component:MainLandingPage,
    },

    {
    name:'PSR',
    path:primary+'psr',
    component:MainLandingPage,
    },

    {
    name:'Ownership',
    path:primary+'ownership',
    component:PrimaryDistributionPage

    },


//secondary


{
    name: 'School Distribution',
    path: secondary+'school-distribution',
    component: MainLandingPage,
    },


    {
    name: 'Distance to Key Location',
    path: secondary+'key-location-distance',
    component: MainLandingPage,
    },

    {
    name:'Registration Status',
    path:secondary+'registration-status',
    component:MainLandingPage,
    },

    {
    name:'School Ownership',
    path:secondary+'school-ownership',
    component:MainLandingPage,
    },

    {
    name:'Boarding Status',
    path:secondary+'boarding',
    component:MainLandingPage,
    },

    {
    name:'School Funding',
    path:secondary+'funding',
    component:MainLandingPage,
    },
    //infrastructure
    {
    name:'Infrastructure Category',
    path:secondary+'infrastructure-category',
    component:MainLandingPage,
    },

    {
    name:'Sanitation Facilities',
    path:secondary+'sanitation-facilities',
    component:MainLandingPage,
    },

    {
    name:'Text Books',
    path:secondary+'text-books',
    component:MainLandingPage,
    },

    {
    name:'Instructional Material',
    path:secondary+'instructional-material',
    component:MainLandingPage,
    },

    {
    name:'Lab Equipment',
    path:secondary+'lab-equipment',
    component:MainLandingPage,
    },

    {
    name:'Water Sources',
    path:secondary+'water-sources',
    component:MainLandingPage,
    },

    {
    name:'Energy Sources',
    path:secondary+'energy-sources',
    component:MainLandingPage,
    },

    {
    name:'Stances Availability',
    path:secondary+'stances-availability',
    component:MainLandingPage,
    },

    {
    name:'Enrolment',
    path:secondary+'enrolment',
    component:MainLandingPage,
    },

    {
    name:'Orphanage',
    path:secondary+'orphanage',
    component:MainLandingPage,
    },

    {
    name:'Special Needs',
    path:secondary+'special-needs',
    component:MainLandingPage,
    },

    {
    name:'Learner Transfers',
    path:secondary+'learner-transfer',
    component:MainLandingPage,
    },


    {
    name:'Class Repeatition',
    path:secondary+'class-repeatition',
    component:MainLandingPage,
    },


    {
    name:'Seating Capacity',
    path:secondary+'seating-capacity',
    component:MainLandingPage,
    },



    {
    name:'Dropout Status',
    path:secondary+'dropout-status',
    component:MainLandingPage,
    },


    {
    name:'Activity Categories',
    path:secondary+'activity-category',
    component:MainLandingPage,
    },


    {
    name:'Participation',
    path:secondary+'participation',
    component:MainLandingPage,
    },


    {
    name:'Budget & Expenditure',
    path:secondary+'budget',
    component:MainLandingPage,
    },


    {
    name:'Equipment & Facilities',
    path:secondary+'equipment',
    component:MainLandingPage,
    },


    {
    name:'Teaching Staff',
    path:secondary+'teaching-staff',
    component:MainLandingPage,
    },

    {
    name:'Non-Teaching Staff',
    path:secondary+'non-teaching-staff',
    component:MainLandingPage,
    },

    {
    name:'Teacher Exodus',
    path:secondary+'teacher-exodus',
    component:MainLandingPage,
    },

    {
    name:'HIV/AIDS',
    path:secondary+'hiv-aids',
    component:MainLandingPage,
    },


    {
    name:'GER',
    path:secondary+'ger',
    component:MainLandingPage,
    },

    {
    name:'NER',
    path:secondary+'ner',
    component:MainLandingPage,
    },

    {
    name:'PTR',
    path:secondary+'ptr',
    component:MainLandingPage,
    },

    {
    name:'PCR',
    path:secondary+'pcr',
    component:MainLandingPage,
    },

    {
    name:'PSR',
    path:secondary+'psr',
    component:MainLandingPage,
    },


//ptc


{
    name: 'School Distribution',
    path: ptc+'school-distribution',
    component: MainLandingPage,
    },


    {
    name: 'Distance to Key Location',
    path: ptc+'key-location-distance',
    component: MainLandingPage,
    },

    {
    name:'Registration Status',
    path:ptc+'registration-status',
    component:MainLandingPage,
    },

    {
    name:'School Ownership',
    path:ptc+'school-ownership',
    component:MainLandingPage,
    },

    {
    name:'Boarding Status',
    path:ptc+'boarding',
    component:MainLandingPage,
    },

    {
    name:'School Funding',
    path:ptc+'funding',
    component:MainLandingPage,
    },
    //infrastructure
    {
    name:'Infrastructure Category',
    path:ptc+'infrastructure-category',
    component:MainLandingPage,
    },

    {
    name:'Sanitation Facilities',
    path:ptc+'sanitation-facilities',
    component:MainLandingPage,
    },

    {
    name:'Text Books',
    path:ptc+'text-books',
    component:MainLandingPage,
    },

    {
    name:'Instructional Material',
    path:ptc+'instructional-material',
    component:MainLandingPage,
    },

    {
    name:'Lab Equipment',
    path:ptc+'lab-equipment',
    component:MainLandingPage,
    },

    {
    name:'Water Sources',
    path:ptc+'water-sources',
    component:MainLandingPage,
    },

    {
    name:'Energy Sources',
    path:ptc+'energy-sources',
    component:MainLandingPage,
    },

    {
    name:'Stances Availability',
    path:ptc+'stances-availability',
    component:MainLandingPage,
    },

    {
    name:'Enrolment',
    path:ptc+'enrolment',
    component:MainLandingPage,
    },

    {
    name:'Orphanage',
    path:ptc+'orphanage',
    component:MainLandingPage,
    },

    {
    name:'Special Needs',
    path:ptc+'special-needs',
    component:MainLandingPage,
    },

    {
    name:'Learner Transfers',
    path:ptc+'learner-transfer',
    component:MainLandingPage,
    },


    {
    name:'Class Repeatition',
    path:ptc+'class-repeatition',
    component:MainLandingPage,
    },


    {
    name:'Seating Capacity',
    path:ptc+'seating-capacity',
    component:MainLandingPage,
    },



    {
    name:'Dropout Status',
    path:ptc+'dropout-status',
    component:MainLandingPage,
    },


    {
    name:'Activity Categories',
    path:ptc+'activity-category',
    component:MainLandingPage,
    },


    {
    name:'Participation',
    path:ptc+'participation',
    component:MainLandingPage,
    },


    {
    name:'Budget & Expenditure',
    path:ptc+'budget',
    component:MainLandingPage,
    },


    {
    name:'Equipment & Facilities',
    path:ptc+'equipment',
    component:MainLandingPage,
    },


    {
    name:'Teaching Staff',
    path:ptc+'teaching-staff',
    component:MainLandingPage,
    },

    {
    name:'Non-Teaching Staff',
    path:ptc+'non-teaching-staff',
    component:MainLandingPage,
    },

    {
    name:'Teacher Exodus',
    path:ptc+'teacher-exodus',
    component:MainLandingPage,
    },

    {
    name:'HIV/AIDS',
    path:ptc+'hiv-aids',
    component:MainLandingPage,
    },


    {
    name:'GER',
    path:ptc+'ger',
    component:MainLandingPage,
    },

    {
    name:'NER',
    path:ptc+'ner',
    component:MainLandingPage,
    },

    {
    name:'PTR',
    path:ptc+'ptr',
    component:MainLandingPage,
    },

    {
    name:'PCR',
    path:ptc+'pcr',
    component:MainLandingPage,
    },

    {
    name:'PSR',
    path:ptc+'psr',
    component:MainLandingPage,
    },

    //btvet


    {
        name: 'School Distribution',
        path: bvtvet+'school-distribution',
        component: MainLandingPage,
        },


        {
        name: 'Distance to Key Location',
        path: bvtvet+'key-location-distance',
        component: MainLandingPage,
        },

        {
        name:'Registration Status',
        path:bvtvet+'registration-status',
        component:MainLandingPage,
        },

        {
        name:'School Ownership',
        path:bvtvet+'school-ownership',
        component:MainLandingPage,
        },

        {
        name:'Boarding Status',
        path:bvtvet+'boarding',
        component:MainLandingPage,
        },

        {
        name:'School Funding',
        path:bvtvet+'funding',
        component:MainLandingPage,
        },
        //infrastructure
        {
        name:'Infrastructure Category',
        path:bvtvet+'infrastructure-category',
        component:MainLandingPage,
        },

        {
        name:'Sanitation Facilities',
        path:bvtvet+'sanitation-facilities',
        component:MainLandingPage,
        },

        {
        name:'Text Books',
        path:bvtvet+'text-books',
        component:MainLandingPage,
        },

        {
        name:'Instructional Material',
        path:bvtvet+'instructional-material',
        component:MainLandingPage,
        },

        {
        name:'Lab Equipment',
        path:bvtvet+'lab-equipment',
        component:MainLandingPage,
        },

        {
        name:'Water Sources',
        path:bvtvet+'water-sources',
        component:MainLandingPage,
        },

        {
        name:'Energy Sources',
        path:bvtvet+'energy-sources',
        component:MainLandingPage,
        },

        {
        name:'Stances Availability',
        path:bvtvet+'stances-availability',
        component:MainLandingPage,
        },

        {
        name:'Enrolment',
        path:bvtvet+'enrolment',
        component:MainLandingPage,
        },

        {
        name:'Orphanage',
        path:bvtvet+'orphanage',
        component:MainLandingPage,
        },

        {
        name:'Special Needs',
        path:bvtvet+'special-needs',
        component:MainLandingPage,
        },

        {
        name:'Learner Transfers',
        path:bvtvet+'learner-transfer',
        component:MainLandingPage,
        },


        {
        name:'Class Repeatition',
        path:bvtvet+'class-repeatition',
        component:MainLandingPage,
        },


        {
        name:'Seating Capacity',
        path:bvtvet+'seating-capacity',
        component:MainLandingPage,
        },



        {
        name:'Dropout Status',
        path:bvtvet+'dropout-status',
        component:MainLandingPage,
        },


        {
        name:'Activity Categories',
        path:bvtvet+'activity-category',
        component:MainLandingPage,
        },


        {
        name:'Participation',
        path:bvtvet+'participation',
        component:MainLandingPage,
        },


        {
        name:'Budget & Expenditure',
        path:bvtvet+'budget',
        component:MainLandingPage,
        },


        {
        name:'Equipment & Facilities',
        path:bvtvet+'equipment',
        component:MainLandingPage,
        },


        {
        name:'Teaching Staff',
        path:bvtvet+'teaching-staff',
        component:MainLandingPage,
        },

        {
        name:'Non-Teaching Staff',
        path:bvtvet+'non-teaching-staff',
        component:MainLandingPage,
        },

        {
        name:'Teacher Exodus',
        path:bvtvet+'teacher-exodus',
        component:MainLandingPage,
        },

        {
        name:'HIV/AIDS',
        path:bvtvet+'hiv-aids',
        component:MainLandingPage,
        },


        {
        name:'GER',
        path:bvtvet+'ger',
        component:MainLandingPage,
        },

        {
        name:'NER',
        path:bvtvet+'ner',
        component:MainLandingPage,
        },

        {
        name:'PTR',
        path:bvtvet+'ptr',
        component:MainLandingPage,
        },

        {
        name:'PCR',
        path:bvtvet+'pcr',
        component:MainLandingPage,
        },

        {
        name:'PSR',
        path:bvtvet+'psr',
        component:MainLandingPage,
        },
//university


{
    name: 'School Distribution',
    path: university+'school-distribution',
    component: MainLandingPage,
    },


    {
    name: 'Distance to Key Location',
    path: university+'key-location-distance',
    component: MainLandingPage,
    },

    {
    name:'Registration Status',
    path:university+'registration-status',
    component:MainLandingPage,
    },

    {
    name:'School Ownership',
    path:university+'school-ownership',
    component:MainLandingPage,
    },

    {
    name:'Boarding Status',
    path:university+'boarding',
    component:MainLandingPage,
    },

    {
    name:'School Funding',
    path:university+'funding',
    component:MainLandingPage,
    },
    //infrastructure
    {
    name:'Infrastructure Category',
    path:university+'infrastructure-category',
    component:MainLandingPage,
    },

    {
    name:'Sanitation Facilities',
    path:university+'sanitation-facilities',
    component:MainLandingPage,
    },

    {
    name:'Text Books',
    path:university+'text-books',
    component:MainLandingPage,
    },

    {
    name:'Instructional Material',
    path:university+'instructional-material',
    component:MainLandingPage,
    },

    {
    name:'Lab Equipment',
    path:university+'lab-equipment',
    component:MainLandingPage,
    },

    {
    name:'Water Sources',
    path:university+'water-sources',
    component:MainLandingPage,
    },

    {
    name:'Energy Sources',
    path:university+'energy-sources',
    component:MainLandingPage,
    },

    {
    name:'Stances Availability',
    path:university+'stances-availability',
    component:MainLandingPage,
    },

    {
    name:'Enrolment',
    path:university+'enrolment',
    component:MainLandingPage,
    },

    {
    name:'Orphanage',
    path:university+'orphanage',
    component:MainLandingPage,
    },

    {
    name:'Special Needs',
    path:university+'special-needs',
    component:MainLandingPage,
    },

    {
    name:'Learner Transfers',
    path:university+'learner-transfer',
    component:MainLandingPage,
    },


    {
    name:'Class Repeatition',
    path:university+'class-repeatition',
    component:MainLandingPage,
    },


    {
    name:'Seating Capacity',
    path:university+'seating-capacity',
    component:MainLandingPage,
    },



    {
    name:'Dropout Status',
    path:university+'dropout-status',
    component:MainLandingPage,
    },


    {
    name:'Activity Categories',
    path:university+'activity-category',
    component:MainLandingPage,
    },


    {
    name:'Participation',
    path:university+'participation',
    component:MainLandingPage,
    },


    {
    name:'Budget & Expenditure',
    path:university+'budget',
    component:MainLandingPage,
    },


    {
    name:'Equipment & Facilities',
    path:university+'equipment',
    component:MainLandingPage,
    },


    {
    name:'Teaching Staff',
    path:university+'teaching-staff',
    component:MainLandingPage,
    },

    {
    name:'Non-Teaching Staff',
    path:university+'non-teaching-staff',
    component:MainLandingPage,
    },

    {
    name:'Teacher Exodus',
    path:university+'teacher-exodus',
    component:MainLandingPage,
    },

    {
    name:'HIV/AIDS',
    path:university+'hiv-aids',
    component:MainLandingPage,
    },


    {
    name:'GER',
    path:university+'ger',
    component:MainLandingPage,
    },

    {
    name:'NER',
    path:university+'ner',
    component:MainLandingPage,
    },

    {
    name:'PTR',
    path:university+'ptr',
    component:MainLandingPage,
    },

    {
    name:'PCR',
    path:university+'pcr',
    component:MainLandingPage,
    },

    {
    name:'PSR',
    path:university+'psr',
    component:MainLandingPage,
    },





];
