USE [master]
GO

CREATE DATABASE [LOJA]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'LOJA', FILENAME = N'D:\LOJA\LOJA.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'LOJA_log', FILENAME = N'D:\LOJA\LOJA_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
GO

IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [LOJA].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO