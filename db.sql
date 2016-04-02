-- phpMyAdmin SQL Dump
-- version 2.10.0.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost:3306
-- Generation Time: Jun 26, 2007 at 03:59 PM
-- Server version: 5.0.37
-- PHP Version: 5.2.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `college`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `assignment`
-- 

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(25) NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `class`
-- 

CREATE TABLE `class` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(25) NOT NULL,
  `duration` int(11) NOT NULL,
  `description` text NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `course`
-- 

CREATE TABLE `course` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(25) NOT NULL,
  `duration` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `result`
-- 

CREATE TABLE `result` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(25) NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `student`
-- 

CREATE TABLE `student` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(25) NOT NULL,
  `nationality` varchar(25) NOT NULL,
  `mobile_phone` int(11) NOT NULL,
  `avatar` varchar(25) NOT NULL,
  `course_id` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `student_assignment_result`
-- 

CREATE TABLE `student_assignment_result` (
  `id` int(11) NOT NULL auto_increment,
  `student_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `result_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `student_class`
-- 

CREATE TABLE `student_class` (
  `id` int(11) NOT NULL auto_increment,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;
